<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all();
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
            'title'              => 'required|string',
            'price_quad'         => 'required|numeric',
            'price_triple'       => 'nullable|numeric',
            'price_double'       => 'nullable|numeric',
            'departure_date'     => 'required|date',
            'duration_days'      => 'required|integer',
            'hotel_stars'        => 'required|integer',
            'total_seats'        => 'required|integer',
            'available_seats'    => 'required|integer',
            'departure_location' => 'required|string',
            'airline'            => 'nullable|string',
            'flight_route'       => 'nullable|string',
        ]);

        Package::create($validated);

        return redirect()->route('packages.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'title'              => 'required|string',
            'price_quad'         => 'required|numeric',
            'price_triple'       => 'nullable|numeric',
            'price_double'       => 'nullable|numeric',
            'departure_date'     => 'required|date',
            'duration_days'      => 'required|integer',
            'hotel_stars'        => 'required|integer',
            'total_seats'        => 'required|integer',
            'available_seats'    => 'required|integer',
            'departure_location' => 'required|string',
            'airline'            => 'nullable|string',
            'flight_route'       => 'nullable|string',
        ]);

        $package->update($validated);

        return redirect()->route('packages.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')
            ->with('warning', 'Paket berhasil dihapus.');
    }
}
