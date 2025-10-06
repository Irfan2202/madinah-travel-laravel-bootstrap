<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Tampilkan semua paket.
     */
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Form tambah paket.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Simpan paket baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'              => 'required|string|max:255',
            'image'              => 'nullable|string|max:255', // sementara string, bukan file
            'description'        => 'nullable|string',
            'guide_name'         => 'nullable|string|max:255',
            'hotel_makkah'       => 'nullable|string|max:255',
            'hotel_madinah'      => 'nullable|string|max:255',
            'departure_date'     => 'required|date',
            'return_date'        => 'nullable|date|after_or_equal:departure_date',
            'departure_day'      => 'nullable|string|max:20',
            'duration_days'      => 'required|integer|min:1',
            'hotel_stars'        => 'required|integer|min:1|max:5',
            'total_pax'          => 'required|integer|min:1',
            'available_pax'      => 'required|integer|min:0',
            'departure_location' => 'required|string|max:255',
            'airline'            => 'nullable|string|max:255',
            'flight_route'       => 'nullable|string|max:255',

        ]);

        Package::create($validated);

        return redirect()->route('packages.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Form edit paket.
     */
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update data paket.
     */
    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'title'              => 'required|string|max:255',
            'image'              => 'nullable|string|max:255',
            'description'        => 'nullable|string',
            'guide_name'         => 'nullable|string|max:255',
            'hotel_makkah'       => 'nullable|string|max:255',
            'hotel_madinah'      => 'nullable|string|max:255',
            'departure_date'     => 'required|date',
            'return_date'        => 'nullable|date|after_or_equal:departure_date',
            'departure_day'      => 'nullable|string|max:20',
            'duration_days'      => 'required|integer|min:1',
            'hotel_stars'        => 'required|integer|min:1|max:5',
            'total_pax'          => 'required|integer|min:1',
            'available_pax'      => 'required|integer|min:0',
            'departure_location' => 'required|string|max:255',
            'airline'            => 'nullable|string|max:255',
            'flight_route'       => 'nullable|string|max:255',
        ]);

        $package->update($validated);

        return redirect()->route('packages.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    /**
     * Hapus paket.
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')
            ->with('warning', 'Paket berhasil dihapus.');
    }
}
