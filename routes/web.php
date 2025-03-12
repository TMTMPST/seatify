<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\DaftarKonserController;
use App\Http\Controllers\BandSocialController;
use App\Models\DaftarKonser;

// Landing Page & Halaman Umum
Route::view('/', 'welcome');
Route::view('/konser', 'konser');
Route::view('/faq', 'components.widget.faq');

// Cek Status Login
Route::get('/cek-login', fn() => response()->json(['logged_in' => Auth::check()]));

// Autentikasi
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register']);

// Login Google
Route::prefix('auth/google')->group(function () {
    Route::get('/', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/callback', [GoogleController::class, 'handleGoogleCallback']);
});

// Detail Konser
Route::get('/detail-konser/{id}', fn($id) => view('detail_concert', ['konser' => DaftarKonser::findOrFail($id)]));
Route::get('/detail-konser/{id}/tiket', fn($id) => view('tiket_konser', ['konser' => DaftarKonser::findOrFail($id)]));

// Pembelian Tiket
Route::prefix('pembelian')->group(function () {
    Route::post('/hitung-total', [BuyController::class, 'hitungTotal']);
    Route::post('/buat-pesanan', [BuyController::class, 'buatPesanan']);
    Route::post('/midtrans/notification', [BuyController::class, 'handleNotification']);
});

// Band
Route::get('/band', [BandController::class, 'index']);
Route::resource('band', BandController::class)->except(['index']);

// Admin
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.index')->name('admin.dashboard');
    Route::resource('konser', DaftarKonserController::class)->except(['show']);

    // Manajemen Band
    Route::prefix('band')->group(function () {
        Route::get('/', [BandController::class, 'Adminindex'])->name('admin.band.index');
        Route::view('/tambah-band', 'admin.functions.tambah_band')->name('admin.band.create');
        Route::post('/tambah-band', [BandController::class, 'store'])->name('admin.band.store');
        Route::get('{band}/tambah-anggota', [BandController::class, 'createMember'])->name('admin.band.anggota.create');
        Route::post('{band}/anggota', [BandController::class, 'storeMember'])->name('admin.band.anggota.store');
        Route::delete('{band}', [BandController::class, 'destroy'])->name('admin.band.destroy');
        Route::get('{band}/edit', [BandController::class, 'edit'])->name('admin.band.edit');
        Route::put('{band}', [BandController::class, 'update'])->name('admin.band.update');

        Route::prefix('{band}/anggota')->group(function () {
            // Routes for editing band member
            Route::get('{anggota}/edit', [BandController::class, 'editMember'])->name('admin.band.anggota.edit');
            Route::put('{anggota}', [BandController::class, 'updateMember'])->name('admin.band.anggota.update');
        });

        // Manajemen Social Media Band
        Route::prefix('{band}/social')->group(function () {
            Route::get('/tambah', [BandSocialController::class, 'create'])->name('admin.band.social.create');
            Route::post('/store', [BandSocialController::class, 'store'])->name('admin.band.social.store');
            Route::get('{social}/edit', [BandSocialController::class, 'edit'])->name('admin.band.social.edit');
            Route::put('{social}', [BandSocialController::class, 'update'])->name('admin.band.social.update');
        });
    });

    // Manajemen Users
    Route::prefix('users')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.users');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.users.update');
        Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.users.delete');
    });
});