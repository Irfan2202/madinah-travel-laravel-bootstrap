<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PackageController;
use Phiki\Phast\Root;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('admin/packages', PackageController::class);
Route::get('/admin/packages/edit/{id}', [PackageController::class, 'edit'])->name('packages.edit');
Route::put('/admin/packages/update/{id}', [PackageController::class, 'update'])->name('packages.update');
