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
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Detail Konser
Route::get('/detail-konser/{id}', fn($id) => view('detail_concert', ['konser' => DaftarKonser::findOrFail($id)]));
Route::get('/detail-konser/{id}/tiket', fn($id) => view('tiket_konser', ['konser' => DaftarKonser::findOrFail($id)]));

// Pembelian Tiket
Route::post('/pembelian/hitung-total', [BuyController::class, 'hitungTotal']);
Route::post('/pembelian/buat-pesanan', [BuyController::class, 'buatPesanan']);
Route::post('/pembelian/midtrans/notification', [BuyController::class, 'handleNotification']);

// Band
Route::get('/band', [BandController::class, 'index']);
Route::resource('/band', BandController::class)->except(['index']);

// Admin Dashboard
Route::view('/admin', 'admin.index')->name('admin.dashboard');

// Manajemen Konser
Route::resource('/admin/konser', DaftarKonserController::class)->except(['show']);
Route::get('/admin/konser/tambah-konser', [DaftarKonserController::class, 'create'])->name('admin.konser.create');
Route::post('/admin/konser/tambah-konser', [DaftarKonserController::class, 'store'])->name('admin.konser.store');


// Manajemen Band
Route::get('/admin/band', [BandController::class, 'Adminindex'])->name('admin.band.index');
Route::view('/admin/band/tambah-band', 'admin.functions.tambah_band')->name('admin.band.create');
Route::post('/admin/band/tambah-band', [BandController::class, 'store'])->name('admin.band.store');
Route::get('/admin/band/{band}/tambah-anggota', [BandController::class, 'createMember'])->name('admin.band.anggota.create');
Route::post('/admin/band/{band}/anggota', [BandController::class, 'storeMember'])->name('admin.band.anggota.store');
Route::delete('/admin/band/{band}', [BandController::class, 'destroy'])->name('admin.band.destroy');
Route::get('/admin/band/{band}/edit', [BandController::class, 'edit'])->name('admin.band.edit');
Route::put('/admin/band/{band}', [BandController::class, 'update'])->name('admin.band.update');

// Manajemen Anggota Band
Route::get('/admin/band/{band}/anggota/{anggota}/edit', [BandController::class, 'editMember'])->name('admin.band.anggota.edit');
Route::put('/admin/band/{band}/anggota/{anggota}', [BandController::class, 'updateMember'])->name('admin.band.anggota.update');

// Manajemen Social Media Band
Route::get('/admin/band/{band}/social/tambah', [BandSocialController::class, 'create'])->name('admin.band.social.create');
Route::post('/admin/band/{band}/social/store', [BandSocialController::class, 'store'])->name('admin.band.social.store');
Route::get('/admin/band/{band}/social/{social}/edit', [BandSocialController::class, 'edit'])->name('admin.band.social.edit');
Route::put('/admin/band/{band}/social/{social}', [BandSocialController::class, 'update'])->name('admin.band.social.update');

// Manajemen Users
Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
Route::get('/admin/users/edit/{id}', [AdminController::class, 'edit'])->name('admin.users.edit');
Route::post('/admin/users/update/{id}', [AdminController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/delete/{id}', [AdminController::class, 'destroy'])->name('admin.users.delete');
