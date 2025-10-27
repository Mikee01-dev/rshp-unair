<?php

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isPerawat;
use App\Http\Middleware\isResepsionis;
use App\Http\Middleware\isDokter;
use App\Http\Middleware\isPemilik;
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
route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('cekKoneksi');

route::get('/admin/dashboard', [SiteController::class, 'dashboard'])->name('admin.dashboard.index');

Auth::routes();

Route::middleware(['auth', isAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
    Route::get('/admin/ras-hewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
    Route::get('/admin/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori-klinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');  
    Route::get('/admin/kode-tindakan', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan-terapi.index');
    Route::get('/admin/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/admin/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('admin.pet.index');
    Route::get('/admin/user-role', [App\Http\Controllers\Admin\RoleUserController::class, 'index'])->name('admin.user-role.index');
    Route::get('/admin/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
});

Route::middleware(['auth', isResepsionis::class])->group(function () {
    Route::get('/resepsionis/dashboard', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'index'])->name('resepsionis.dashboard');
    Route::get('/resepsionis/pet', [App\Http\Controllers\Resepsionis\PetController::class, 'index'])->name('resepsionis.pet.index');
    Route::get('/resepsionis/pemilik', [App\Http\Controllers\Resepsionis\PemilikController::class, 'index'])->name('resepsionis.pemilik.index');
    Route::get('/resepsionis/temu-dokter', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'index'])->name('resepsionis.temu-dokter.index');
});

Route::middleware(['auth', isPerawat::class])->group(function () {
    route::get('/perawat/dashboard', [App\Http\Controllers\Perawat\DashboardPerawatController::class, 'index'])->name('perawat.dashboard');
    Route::get('/perawat/rekam-medis', [App\Http\Controllers\Perawat\RekamMedisController::class, 'index'])->name('perawat.rekam-medis.index');
});

Route::middleware(['auth', isDokter::class])->group(function () {
    route::get('/dokter/dashboard', [App\Http\Controllers\Dokter\DashboardDokterController::class, 'index'])->name('dokter.dashboard');
    Route::get('/dokter/rekam-medis', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'rekamMedisSaya'])->name('dokter.rekam-medis');
});

Route::middleware(['auth', isPemilik::class])->group(function () {
    route::get('/pemilik/dashboard', [App\Http\Controllers\Pemilik\DashboardPemilikController::class, 'index'])->name('pemilik.dashboard');
});
