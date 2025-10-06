<?php

namespace App\Http\Controllers;


use App\Models\Package;
use App\Models\Price;


class HomeController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('index', compact('packages'));
    }
    public function detail($id)
    {
        $package = Package::findOrFail($id);
        $prices = Price::all(); // global prices
        return view('pages.packages.detail', compact('package', 'prices'));
    }
}
