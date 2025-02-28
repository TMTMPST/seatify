<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/konser', function () {
    return view('konser');
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