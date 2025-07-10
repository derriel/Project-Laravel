<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

 Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [BarangController::class, 'index'])->name('dashboard');

Route::resource('/galeri', GaleriController::class);


Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');


Route::post('/kontak', [KontakController::class, 'sendVerification'])->name('kontak.sendVerification');

Route::get('/verify/{token}', function ($token) {
    // logika verifikasi atau view
    return "Token verifikasi: " . $token;
});





Route::resource('/barang', BarangController::class);
Route::get('/barang/konfirmasi-hapus/{id}', [BarangController::class, 'confirmDestroy'])->name('barang.confirmDestroy');
Route::get('/barang/view/{id}', [BarangController::class, 'show'])->name('barang.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/barang', BarangController::class)->except(['show']);

require __DIR__.'/auth.php';