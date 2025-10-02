<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Schedule;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Menampilkan Form Pemesanan
     */
    public function create(Request $request)
    {
        // Ambil data schedule_id dan package_id dari query parameter
        $scheduleId = $request->query('schedule');
        $packageId = $request->query('package');

        // Validasi dan ambil data (Penting untuk keamanan dan logika)
        if (!$scheduleId || !$packageId) {
            return redirect()->back()->with('error', 'Jadwal atau Paket tidak ditemukan.');
        }

        $package = Package::findOrFail($packageId);
        $schedule = Schedule::findOrFail($scheduleId);

        // Cek ketersediaan seat
        if ($schedule->available_seats <= 0) {
            return redirect()->route('packages.show', $package)->with('error', 'Maaf, jadwal ini sudah penuh.');
        }

        return view('pages.orders.create', compact('package', 'schedule', 'scheduleId', 'packageId'));
    }

    /**
     * Menyimpan data pemesanan dan jamaah
     */
    public function store(Request $request)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'package_id' => 'required|exists:packages,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'jamaah' => 'required|array|min:1', // Harus ada minimal 1 jamaah
            'jamaah.*.name' => 'required|string|max:255',
            'jamaah.*.identity' => 'required|string|max:50',
            'jamaah.*.birthdate' => 'required|date',
        ]);

        // Hitung jumlah jamaah
        $jamaahCount = count($validatedData['jamaah']);
        $schedule = Schedule::findOrFail($validatedData['schedule_id']);

        // 2. Cek Ketersediaan Seat Akhir
        if ($schedule->available_seats < $jamaahCount) {
            return redirect()->back()->withInput()->with('error', 'Jumlah seat yang diminta melebihi ketersediaan.');
        }

        // 3. Proses Transaksi Database
        // Gunakan transaksi agar data tersimpan semua atau gagal semua (atomisitas)
        try {
            DB::beginTransaction();

            // 3a. Hitung Harga Total (Asumsi harga per orang = harga paket)
            $package = Package::findOrFail($validatedData['package_id']);
            $totalPrice = $package->price * $jamaahCount; // Asumsi package memiliki kolom 'price'

            // 3b. Buat Order
            $order = Order::create([
                'package_id' => $validatedData['package_id'],
                'schedule_id' => $validatedData['schedule_id'],
                'customer_name' => $validatedData['customer_name'],
                'customer_email' => $validatedData['customer_email'],
                'customer_phone' => $validatedData['customer_phone'],
                'total_price' => $totalPrice,
                'status' => 'pending', // Status awal
            ]);

            // 3c. Simpan Data Jamaah
            foreach ($validatedData['jamaah'] as $jamaahData) {
                $order->jamaahs()->create($jamaahData);
            }

            // 3d. Update Ketersediaan Seat
            $schedule->decrement('available_seats', $jamaahCount);


            DB::commit();

            // 4. Redirect ke halaman Invoice/Konfirmasi
            return redirect()->route('orders.show', $order->id)->with('success', 'Pemesanan berhasil! Silakan selesaikan pembayaran.');
        } catch (\Exception $e) {
            DB::rollback();
            // Log the error: $e->getMessage()
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memproses pemesanan. Mohon coba lagi.');
        }
    }

    /**
     * Tambahkan method show() untuk menampilkan invoice/detail order
     */
    public function show(Order $order)
    {
        // return view('orders.show', compact('order'));
    }
}
