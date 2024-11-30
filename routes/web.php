<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\antrianCrontroller;
use Illuminate\Support\Facades\Route;

// Routes User
Route::get('/', function () {
return view('user.home');
});


Route::get('/antrianUmum', [antrianCrontroller::class, 'makeAntrianUmum'])->name('umum');

Route::get('/antrianPrioritas', [antrianCrontroller::class, 'makeAntrianPrioritas'])->name('prioritas');

Route::post('/simpanAntrian', [antrianCrontroller::class, 'simpanAntrian']);


Route::get('/user/monitor', function () {
    return view('user.monitor');
});




// Routes Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/login', [adminController::class, 'viewLogin'])->middleware('guest');

Route::post('/admin/login', [adminController::class, 'login']);

Route::post('/admin/logout', [adminController::class, 'logout'])->middleware('auth');

Route::put('/admin/edit/{admin}', [adminController::class, 'update']);

Route::get('/admin/loketSatu', [antrianCrontroller::class, 'loketUmum']);

Route::get('/admin/loketDua', function () {
    return view('admin.loketDua');
});

Route::get('admin/rekap', function () {
    return view('admin/rekap');
});

Route::get('admin/profil', function () {
    return view('admin.profil');
});

Route::put('antrian/selesai/{antrian}', [antrianCrontroller::class, 'selesai']);