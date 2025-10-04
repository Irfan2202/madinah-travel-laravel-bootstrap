<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::with('prices')->get();
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'              => 'required|string|max:255',
            'image'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description'        => 'nullable|string',
            'guide_name'         => 'nullable|string|max:255',
            'hotel_makkah'       => 'nullable|string|max:255',
            'hotel_madinah'      => 'nullable|string|max:255',
            'departure_date'     => 'required|date',
            'departure_day'      => 'nullable|string|max:20',
            'duration_days'      => 'required|integer',
            'hotel_stars'        => 'required|integer',
            'total_pax'          => 'required|integer',
            'available_pax'      => 'required|integer',
            'departure_location' => 'required|string|max:255',
            'airline'            => 'nullable|string|max:255',
            'flight_route'       => 'nullable|string|max:255',
            // harga
            'price_quad'         => 'required|numeric',
            'price_triple'       => 'nullable|numeric',
            'price_double'       => 'nullable|numeric',
        ]);

        // Simpan package
        $packageData = collect($validated)->except(['price_quad', 'price_triple', 'price_double'])->toArray();

        if ($request->hasFile('image')) {
            $packageData['image'] = $request->file('image')->store('packages', 'public');
        }

        $package = Package::create($packageData);

        // Simpan harga
        if ($request->price_quad) {
            Price::create(['package_id' => $package->id, 'tipe_kamar' => 'QUAD', 'harga' => $request->price_quad]);
        }
        if ($request->price_triple) {
            Price::create(['package_id' => $package->id, 'tipe_kamar' => 'TRIPLE', 'harga' => $request->price_triple]);
        }
        if ($request->price_double) {
            Price::create(['package_id' => $package->id, 'tipe_kamar' => 'DOUBLE', 'harga' => $request->price_double]);
        }

        return redirect()->route('packages.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = Package::with('prices')->findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'title'              => 'required|string|max:255',
            'image'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description'        => 'nullable|string',
            'guide_name'         => 'nullable|string|max:255',
            'hotel_makkah'       => 'nullable|string|max:255',
            'hotel_madinah'      => 'nullable|string|max:255',
            'departure_date'     => 'required|date',
            'departure_day'      => 'nullable|string|max:20',
            'duration_days'      => 'required|integer',
            'hotel_stars'        => 'required|integer',
            'total_pax'          => 'required|integer',
            'available_pax'      => 'required|integer',
            'departure_location' => 'required|string|max:255',
            'airline'            => 'nullable|string|max:255',
            'flight_route'       => 'nullable|string|max:255',
            // harga
            'price_quad'         => 'required|numeric',
            'price_triple'       => 'nullable|numeric',
            'price_double'       => 'nullable|numeric',
        ]);

        // Update package
        $packageData = collect($validated)->except(['price_quad', 'price_triple', 'price_double'])->toArray();

        if ($request->hasFile('image')) {
            $packageData['image'] = $request->file('image')->store('packages', 'public');
        }

        $package->update($packageData);

        // Update harga
        $package->prices()->updateOrCreate(
            ['tipe_kamar' => 'QUAD'],
            ['harga' => $request->price_quad]
        );
        if ($request->price_triple) {
            $package->prices()->updateOrCreate(
                ['tipe_kamar' => 'TRIPLE'],
                ['harga' => $request->price_triple]
            );
        }
        if ($request->price_double) {
            $package->prices()->updateOrCreate(
                ['tipe_kamar' => 'DOUBLE'],
                ['harga' => $request->price_double]
            );
        }

        return redirect()->route('packages.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->prices()->delete(); // hapus harga dulu
        $package->delete();

        return redirect()->route('packages.index')
            ->with('warning', 'Paket berhasil dihapus.');
    }
}
