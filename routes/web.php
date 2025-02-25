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

Route::get('/admin', action: function () {
    return view('admin.index');
});
Route::get('/kanban', action: function () {
    return view('kanban');
});
Route::get('/inbox', action: function () {
    return view('inbox');
});
Route::get('/users', action: function () {
    return view('users');
});