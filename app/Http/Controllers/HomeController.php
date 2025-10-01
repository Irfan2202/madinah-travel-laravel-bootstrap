<?php

namespace App\Http\Controllers;

use App\Models\Package;


class HomeController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('index', compact('packages'));
    }
    public function detail(Package $package)
    {
        $schedules = $package->schedules()->orderBy('departure_date')->get();
        return view('pages.packages.detail', compact('package', 'schedules'));
    }
}
