<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataJemaatController;
use App\Http\Controllers\Admin\KelolaDataBaptisController;
use App\Http\Controllers\Admin\KelolaDataMenikahController;
use App\Http\Controllers\Admin\KelolaDataSidiController;
use App\Http\Controllers\Admin\WartaJemaatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\Jemaat\BerandaController;
use App\Http\Controllers\Jemaat\PendaftaranBaptisController;
use App\Http\Controllers\Jemaat\PendaftaranMenikahController;
use App\Http\Controllers\Jemaat\PendaftaranSidiController;
use App\Http\Controllers\Jemaat\ProfileController;

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [LoginBasic::class, 'index'])->name('auth-login-basic');
    Route::post('/login', [LoginBasic::class, 'store']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => 'role:Admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/data-jemaat', [DataJemaatController::class, 'index'])->name('data-jemaat');
        Route::get('/data-jemaat/create', [DataJemaatController::class, 'create']);
        Route::post('/data-jemaat', [DataJemaatController::class, 'store']);
        Route::get('/data-jemaat/{id}', [DataJemaatController::class, 'show']);
        Route::get('/data-jemaat/{id}/edit', [DataJemaatController::class, 'edit']);
        Route::put('/data-jemaat/{id}', [DataJemaatController::class, 'update']);
        Route::delete('/data-jemaat/{id}', [DataJemaatController::class, 'destroy']);
        
        Route::get('/warta-jemaat', [WartaJemaatController::class, 'index'])->name('warta-jemaat');
        Route::get('/warta-jemaat/create', [WartaJemaatController::class, 'create']);
        Route::post('/warta-jemaat', [WartaJemaatController::class, 'store']);
        Route::get('/warta-jemaat/{id}', [WartaJemaatController::class, 'show']);
        Route::get('/warta-jemaat/{id}/edit', [WartaJemaatController::class, 'edit']);
        Route::put('/warta-jemaat/{id}', [WartaJemaatController::class, 'update']);
        Route::delete('/warta-jemaat/{id}', [WartaJemaatController::class, 'destroy']);

        Route::get('/warta-jemaat/pelayanan-sepekan/{id}', [WartaJemaatController::class, 'pelayananSepakanCreate']);
        Route::post('/warta-jemaat/pelayanan-sepekan', [WartaJemaatController::class, 'pelayananSepakanStore']);
        Route::delete('/warta-jemaat/pelayanan-sepekan/{id}', [WartaJemaatController::class, 'pelayananSepakanDestroy']);

        Route::get('/warta-jemaat/pengumuman/{id}', [WartaJemaatController::class, 'pengumumanCreate']);
        Route::post('/warta-jemaat/pengumuman', [WartaJemaatController::class, 'pengumumanStore']);
        Route::delete('/warta-jemaat/pengumuman/{id}', [WartaJemaatController::class, 'pengumumanDestroy']);
        
        Route::get('/kelola-data-menikah', [KelolaDataMenikahController::class, 'index'])->name('kelola-data-menikah');
        Route::get('/kelola-data-menikah/{id}', [KelolaDataMenikahController::class, 'show'])->name('kelola-data-menikah.show');
        Route::put('/kelola-data-menikah/{id}', [KelolaDataMenikahController::class, 'update'])->name('kelola-data-menikah.update');
        
        Route::get('/kelola-data-baptis', [KelolaDataBaptisController::class, 'index'])->name('kelola-data-baptis');
        Route::get('/kelola-data-baptis/{id}', [KelolaDataBaptisController::class, 'show'])->name('kelola-data-baptis.show');
        Route::put('/kelola-data-baptis/{id}', [KelolaDataBaptisController::class, 'update'])->name('kelola-data-baptis.update');
        
        Route::get('/kelola-data-sidi', [KelolaDataSidiController::class, 'index'])->name('kelola-data-sidi');
        Route::get('/kelola-data-sidi/{id}', [KelolaDataSidiController::class, 'show'])->name('kelola-data-sidi.show');
        Route::put('/kelola-data-sidi/{id}', [KelolaDataSidiController::class, 'update'])->name('kelola-data-sidi.update');
    });
    
    Route::group(['middleware' => 'role:Jemaat'], function () {
        Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
        
        Route::get('/profile', [ProfileController::class, 'profilSaya'])->name('profile');
        Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
        
        Route::get('/riwayat', [ProfileController::class, 'riwayat'])->name('riwayat');
        Route::post('/unduh-sertifikat-baptis', [ProfileController::class, 'unduhSertifikatBaptis'])->name('unduh-sertifikat-baptis');
        
        Route::get('/pendaftaran-menikah', [PendaftaranMenikahController::class, 'create'])->name('pendaftaran-menikah');
        Route::post('/pendaftaran-menikah', [PendaftaranMenikahController::class, 'store'])->name('pendaftaran-menikah.store');
        Route::post('/cek-status-menikah', [PendaftaranMenikahController::class, 'cekStatusMenikah'])->name('cek-status-menikah');
        
        Route::get('/pendaftaran-baptis', [PendaftaranBaptisController::class, 'create'])->name('pendaftaran-baptis');
        Route::post('/pendaftaran-baptis', [PendaftaranBaptisController::class, 'store'])->name('pendaftaran-baptis.store');
        Route::post('/cek-status-baptis', [PendaftaranBaptisController::class, 'cekStatusBaptis'])->name('cek-status-baptis');
        
        Route::get('/pendaftaran-sidi', [PendaftaranSidiController::class, 'create'])->name('pendaftaran-sidi');
        Route::post('/pendaftaran-sidi', [PendaftaranSidiController::class, 'store'])->name('pendaftaran-sidi.store');
        Route::post('/cek-status-sidi', [PendaftaranSidiController::class, 'cekStatusSidi'])->name('cek-status-sidi');
    });
    
    Route::post('/logout', [LoginBasic::class, 'logout']);
});
