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
}
