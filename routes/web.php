<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isPerawat;
use App\Http\Middleware\isResepsionis;
use App\Http\Middleware\isDokter;
use App\Http\Middleware\isPemilik;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Site\SiteController;

use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\PemilikController;
use App\Http\Controllers\Admin\TemuDokterController;
use App\Http\Controllers\Admin\RekamMedisController;

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Admin\KodeTindakanTerapiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PerawatController;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('cekKoneksi');

Auth::routes();

Route::middleware(['auth', isAdmin::class])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('pemilik', PemilikController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('perawat', PerawatController::class);
    
    Route::resource('pet', PetController::class);
    Route::resource('jenis-hewan', JenisHewanController::class);
    Route::resource('ras-hewan', RasHewanController::class);

    Route::resource('kategori', KategoriController::class);
    Route::resource('kategori-klinis', KategoriKlinisController::class);
    Route::resource('kode-tindakan-terapi', KodeTindakanTerapiController::class);

    Route::resource('role', RoleController::class);
    Route::resource('user-role', RoleUserController::class);

    Route::resource('temu-dokter', TemuDokterController::class);
    Route::patch('temu-dokter/{id}/status', [TemuDokterController::class, 'updateStatus'])->name('temu-dokter.status');

    Route::resource('rekam-medis', RekamMedisController::class);

    Route::post('rekam-medis/{id}/detail', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'store'])
        ->name('detail-rekam-medis.store');

    Route::get('detail-rekam-medis/{id}/edit', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'edit'])
        ->name('detail-rekam-medis.edit');

    Route::put('detail-rekam-medis/{id}', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'update'])
        ->name('detail-rekam-medis.update');

    Route::delete('detail-rekam-medis/{id}', [App\Http\Controllers\Admin\DetailRekamMedisController::class, 'destroy'])
        ->name('detail-rekam-medis.destroy');
});

Route::middleware(['auth', isResepsionis::class])->prefix('resepsionis')->name('resepsionis.')->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'index'])->name('dashboard');

    Route::resource('pemilik', App\Http\Controllers\Resepsionis\PemilikController::class);

    Route::resource('pet', App\Http\Controllers\Resepsionis\PetController::class);

    Route::resource('temu-dokter', App\Http\Controllers\Resepsionis\TemuDokterController::class);
    Route::patch('temu-dokter/{id}/status', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'updateStatus'])->name('temu-dokter.status');
});

Route::middleware(['auth', isPerawat::class])->prefix('perawat')->name('perawat.')->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\Perawat\DashboardPerawatController::class, 'index'])->name('dashboard');
    Route::get('/triage/{idreservasi}', [App\Http\Controllers\Perawat\RekamMedisController::class, 'create'])->name('triage.create');
    Route::post('/triage', [App\Http\Controllers\Perawat\RekamMedisController::class, 'store'])->name('triage.store');
    
    Route::get('/rekam-medis/{id}', [App\Http\Controllers\Perawat\RekamMedisController::class, 'show'])->name('rekam-medis.show');

    Route::get('/rekam-medis', [App\Http\Controllers\Perawat\RekamMedisController::class, 'index'])->name('rekam-medis.index');
    
    Route::get('/rekam-medis/{id}', [App\Http\Controllers\Perawat\RekamMedisController::class, 'show'])->name('rekam-medis.show');

    Route::get('/rekam-medis/{id}/edit', [App\Http\Controllers\Perawat\RekamMedisController::class, 'edit'])->name('rekam-medis.edit');
    Route::put('/rekam-medis/{id}', [App\Http\Controllers\Perawat\RekamMedisController::class, 'update'])->name('rekam-medis.update');

    Route::get('/pasien', [App\Http\Controllers\Perawat\PasienController::class, 'index'])->name('pasien.index');
    
    Route::get('/profile', [App\Http\Controllers\Perawat\ProfileController::class, 'index'])->name('profile');
});

Route::middleware(['auth', isDokter::class])->prefix('dokter')->name('dokter.')->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\Dokter\DashboardDokterController::class, 'index'])->name('dashboard');

    Route::get('/periksa/{id}', [App\Http\Controllers\Dokter\PeriksaController::class, 'edit'])->name('periksa.edit');
    
    Route::put('/periksa/{id}/diagnosa', [App\Http\Controllers\Dokter\PeriksaController::class, 'updateDiagnosa'])->name('periksa.update-diagnosa');
    
    Route::post('/periksa/{id}/detail', [App\Http\Controllers\Dokter\PeriksaController::class, 'storeDetail'])->name('periksa.store-detail');
    
    Route::delete('/periksa/detail/{id_detail}', [App\Http\Controllers\Dokter\PeriksaController::class, 'destroyDetail'])->name('periksa.destroy-detail');
    
    Route::post('/periksa/{id}/selesai', [App\Http\Controllers\Dokter\PeriksaController::class, 'selesai'])->name('periksa.selesai');

    Route::get('/rekam-medis', [App\Http\Controllers\Dokter\RekamMedisController::class, 'index'])->name('rekam-medis.index');
    Route::get('/rekam-medis/{id}', [App\Http\Controllers\Dokter\RekamMedisController::class, 'show'])->name('rekam-medis.show');

    Route::get('/pasien', [App\Http\Controllers\Dokter\PasienController::class, 'index'])->name('pasien.index');

    Route::get('/periksa/detail/{id_detail}/edit', [App\Http\Controllers\Dokter\PeriksaController::class, 'editDetail'])
        ->name('periksa.edit-detail');
        
    Route::put('/periksa/detail/{id_detail}', [App\Http\Controllers\Dokter\PeriksaController::class, 'updateDetail'])
        ->name('periksa.update-detail');

    Route::get('/profile', [App\Http\Controllers\Dokter\ProfileController::class, 'index'])->name('profile');
});

Route::middleware(['auth', isPemilik::class])->prefix('pemilik')->name('pemilik.')->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\Pemilik\DashboardPemilikController::class, 'index'])->name('dashboard');

    Route::get('/pet', [App\Http\Controllers\Pemilik\PetPemilikController::class, 'index'])->name('pet.index');

    Route::get('/temu-dokter', [App\Http\Controllers\Pemilik\TemuPemilikController::class, 'index'])->name('temu-dokter.index');

    Route::get('/rekam-medis', [App\Http\Controllers\Pemilik\RekamMedisPemilikController::class, 'index'])->name('rekam-medis.index');
    Route::get('/rekam-medis/{id}', [App\Http\Controllers\Pemilik\RekamMedisPemilikController::class, 'show'])->name('rekam-medis.show');

    Route::get('/profile', [App\Http\Controllers\Pemilik\ProfileController::class, 'index'])->name('profile');
});