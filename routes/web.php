<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PackageController;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('admin/packages', PackageController::class);
