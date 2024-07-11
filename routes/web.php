<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginContriller;
use App\Models\paket;

Route::get('/validasi', [LoginContriller::class , 'validasi']);
Route::get('/logout', [LoginContriller::class , 'logout'])->name('logout');
Route::resource('/paket', App\Http\Controllers\PaketController::class);
Route::resource('/pesanan', App\Http\Controllers\pesananController::class);

Route::get('/', function () {
    return view('page.index');
});
Route::get('/pesan', function () {
    $paket = paket::all();
    return view('page.pesan',compact('paket'));
})->name('pesan');
Route::get('/login', function () {
    return view('admin.login');
})->name('login');
Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/hitung', [App\Http\Controllers\SAWController::class, "SAW"])->name("hitung");
Route::get('/prioritas', [App\Http\Controllers\SAWController::class, "index"])->name("prioritas");

