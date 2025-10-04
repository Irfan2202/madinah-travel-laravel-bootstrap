<?php

use Phiki\Phast\Root;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\PackageController;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('admin/packages', PackageController::class);
Route::get('/admin/packages/edit/{id}', [PackageController::class, 'edit'])->name('packages.edit');
Route::put('/admin/packages/update/{id}', [PackageController::class, 'update'])->name('packages.update');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/packages/{package}', [HomeController::class, 'detail'])->name('packages.detail');
