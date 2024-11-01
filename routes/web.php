<?php

use Illuminate\Support\Facades\Route;

// Routes User
Route::get('/', function () {
    return view('user.home');
});

Route::get('/antrianUmum', function () {
    return view('user.antrianUmum');
});
Route::get('/antriaPrioritas', function () {
    return view('user.antrianPrioritas');
});

Route::get('/user/monitor', function () {
    return view('user.monitor');
});




// Routes Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin/loketSatu', function () {
    return view('admin.loketSatu');
});

Route::get('/admin/loketDua', function () {
    return view('admin.loketDua');
});

Route::get('admin/rekap', function () {
    return view('admin/rekap');
});

Route::get('admin/profil', function () {
    return view('admin/profil');
});