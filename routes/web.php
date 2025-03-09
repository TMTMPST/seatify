<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BandController;
use App\Models\DaftarKonser;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/konser', function () {
    return view('konser');
});

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', function(){
    return view('auth.register');
});
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/detail-konser/{id}', function ($id) {
    $konser = DaftarKonser::findOrFail($id);
    return view('detail_concert', compact('konser'));
});

Route::post('/hitung-total', [BuyController::class, 'hitungTotal']);
Route::post('/buat-pesanan', [BuyController::class, 'buatPesanan']);
Route::post('/midtrans/notification', [BuyController::class, 'handleNotification']);

Route::view('/faq', 'components.widget.faq');

Route::get('/band', [BandController::class, 'index']);

// Admin 

Route::get('/admin', function () {
    if (!Auth::check()) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    if (Auth::user()->level != 0) {
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }

    return view('admin.index');
});
Route::get('/admin/konser', action: function () {
    return view('admin.konser');
});

Route::get('/admin/bio-artis', action: function () {
    return view('admin.bio-artis');
});

Route::get('/admin/konser/tambah-konser', function(){
    return view('admin.functions.tambah_konser');
});

Route::get('/admin/konser/tambah-tiket', function(){
    return view('admin.functions.tambah_tiket');
});

Route::get('/admin/konser/tambah-artis', function(){
    return view('admin.functions.tambah_artis');
});
Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');

Route::get('/admin/users/edit-users/{id}', [AdminController::class, 'edit'])->name('admin.users.edit');

Route::post('/admin/users/update/{id}', [AdminController::class, 'update'])->name('admin.users.update');

Route::delete('/admin/users/delete/{id}', [AdminController::class, 'destroy'])->name('admin.users.delete');