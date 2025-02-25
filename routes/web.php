<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('auth.login');
});
Route::get('/register', function(){
    return view('auth.register');
});

Route::get('/detail-konser', function(){
    return view('detail_concert');
});

Route::get('/pilih-kursi', function(){
    return view('seat_concert');
});

// Admin 

Route::get('/admin', action: function(){
    return view('admin.index');
});