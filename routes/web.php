<?php

use Illuminate\Support\Facades\Route;

// Routes for user folder
Route::get('/', function () {
    return view('user.home');
});

Route::get('/antrian', function () {
    return view('user.antrian');
});



// Routes for admin folder
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/login', function () {
    return view('admin.login');
});
