<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});

route::get('/', [SiteController::class, 'home'])->name('home');
route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
route::get('/login', [SiteController::class, 'login'])->name('login');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('cekKoneksi');

route::get('/admin/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
route::get('/admin/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
route::get('/admin/ras-hewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
route::get('/admin/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('admin.kategori.index');
route::get('/admin/kategori-klinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');  
route::get('/admin/kode-tindakan', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan-terapi.index');
route::get('/admin/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
route::get('/admin/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('admin.pet.index');
route::get('/admin/user-role', [App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('admin.user-role.index');

route::get('/admin/dashboard', [SiteController::class, 'dashboard'])->name('admin.dashboard.index');
