<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/konser', function () {
    return view('konser');
});

Route::get('/login', function(){
    return view('auth.login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', function(){
    return view('auth.register');
});
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/detail-konser', function(){
    return view('detail_concert');
});

// Admin 

Route::get('/admin', function () {
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