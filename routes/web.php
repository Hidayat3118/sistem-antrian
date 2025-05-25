<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\rekapController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\antrianCrontroller;

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
Route::put('antrian/selesai/{antrian}', [antrianCrontroller::class, 'selesai'])->middleware('admin');
Route::put('antrian/terlewat/{antrian}', [antrianCrontroller::class, 'terlewat']);
Route::get('/antrian/terbaru/prioritas', [antrianCrontroller::class, 'getTerbaruPrioritas']);
Route::get('/antrian/terbaru/umum', [antrianCrontroller::class, 'getTerbaruUmum']);


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

Route::get('/admin/upload', function () {
    return view('admin.upload');
});



// vedio

Route::get('/upload', [VideoController::class, 'index'])->name('video.index');
Route::post('/upload', [VideoController::class, 'store'])->name('video.store');
Route::put('/select/{id}', [VideoController::class, 'select'])->name('video.select');
Route::get('/monitor', [VideoController::class, 'monitor'])->name('video.monitor');
Route::get('/monitor/data', [VideoController::class, 'monitorData']);
Route::delete('delete/{id}', [VideoController::class, 'delete'])->name('video.delete');

