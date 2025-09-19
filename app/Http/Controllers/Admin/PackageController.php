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
            'name' => 'required|string',
            'duration' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'hotel_madinah' => 'nullable|string',
            'hotel_makkah' => 'nullable|string',
            'airline' => 'nullable|string',
            'transportation' => 'nullable|string',
            'image' => 'nullable|url',
            'total_quota' => 'nullable|integer',
            'remaining_quota' => 'nullable|integer',
            'visa_type' => 'nullable|string',
            'room_type' => 'nullable|string',
            'meal_type' => 'nullable|string',
            'departure_city' => 'nullable|string',
            'departure_date' => 'nullable|date',
            'return_date' => 'nullable|date',
            'guide_name' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        $package = Package::create($validated);
        return redirect()->route('packages.index')
            ->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            'name' => 'required|string',
            'duration' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'hotel_madinah' => 'nullable|string',
            'hotel_makkah' => 'nullable|string',
            'airline' => 'nullable|string',
            'transportation' => 'nullable|string',
            'image' => 'nullable|url',
            'total_quota' => 'nullable|integer',
            'remaining_quota' => 'nullable|integer',
            'visa_type' => 'nullable|string',
            'room_type' => 'nullable|string',
            'meal_type' => 'nullable|string',
            'departure_city' => 'nullable|string',
            'departure_date' => 'nullable|date',
            'return_date' => 'nullable|date',
            'guide_name' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        // cek checkbox populer
        $validated['is_popular'] = $request->has('is_popular');
        $package->update($validated);

        return redirect()->route('packages.index')
            ->with('success', 'Paket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')
            ->with('warning', 'Paket berhasil dihapus.');
    }
}
