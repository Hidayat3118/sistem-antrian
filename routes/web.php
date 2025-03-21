<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\antrianCrontroller;
use App\Http\Controllers\rekapController;
use Illuminate\Support\Facades\Route;

// Routes User
Route::get('/', function () {
    return view('user.home', [
        'title' => 'Puskesmas | Antrian',
    ]);
});


Route::get('/{jenis}/cluster', [antrianCrontroller::class, 'cluster'])->name('cluster');

Route::get('/antrian/umum/{cluster}', [antrianCrontroller::class, 'makeAntrianUmum']);

Route::get('/antrian/prioritas/{cluster}', [antrianCrontroller::class, 'makeAntrianPrioritas']);

Route::post('/simpanAntrian', [antrianCrontroller::class, 'simpanAntrian']);

Route::get('/user/monitor', [antrianCrontroller::class, 'monitor']);


Route::get('/user/claster', function () {
    
    return view('user.claster', [
        'title' => 'Claster'
    ]);
});


// Routes Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/login', [adminController::class, 'viewLogin'])->name('login')->middleware('guest');

Route::post('/admin/login', [adminController::class, 'login']);

Route::post('/admin/logout', [adminController::class, 'logout'])->middleware('admin');

Route::put('/admin/edit/{admin}', [adminController::class, 'update'])->middleware('admin');

Route::get('/admin/loketSatu', [antrianCrontroller::class, 'loketUmum'])->middleware('admin');

Route::get('/admin/loketDua', [antrianCrontroller::class, 'loketPrioritas'])->middleware('admin');

Route::get('admin/rekap', [rekapController::class, 'index'])->middleware('admin');

Route::get('admin/profil', function () {
    return view('admin.profil', [
        'title' => 'Admin | Profile',
        'active' => 'profile',
    ]);
})->middleware('admin');

Route::put('antrian/selesai/{antrian}', [antrianCrontroller::class, 'selesai'])->middleware('admin');

Route::put('antrian/terlewat/{antrian}', [antrianCrontroller::class, 'terlewat'])->middleware('admin');
