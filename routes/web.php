<?php

use App\Http\Controllers\API\SampahController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\GrapikController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PushNotifController;
use App\Http\Controllers\SampahController as ControllersSampahController;
use App\Http\Controllers\TentangAplikasiController;
use App\Http\Controllers\TugasPerjalananController;
use App\Http\Controllers\ValidasiTabunganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('landing-page');
})->name('welcome');

// USER ROLES
Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::group(['middleware' => 'accessrole:ADMIN'], function() {
        Route::get('/admin/dashboard', function () {
            return view('pages.dashboard');
        })->name('dashboard');
        
        
        // NASABAH
        Route::get('/admin/nasabah', [NasabahController::class, 'index'])->name('nasabah');
        Route::get('/admin/nasabah/detail/{id}', [NasabahController::class, 'show'])->name('detailNasabah');

        // PETUGAS
        Route::get('/admin/petugas', [PetugasController::class, 'index'])->name('petugas');
        Route::put('/admin/petugas/{id}', [PetugasController::class, 'update'])->name('updatePetugas');
        Route::get('/admin/petugas/detail/{id}', [PetugasController::class, 'show'])->name('detailPetugas');

        // SAMPAH
        Route::get('/admin/sampah', [ControllersSampahController::class, 'index'])->name('sampah');
        Route::get('/admin/sampah/create', [ControllersSampahController::class, 'create'])->name('createSampah');
        Route::get('/admin/sampah/{id}/edit', [ControllersSampahController::class, 'edit'])->name('editSampah');
        Route::put('/admin/sampah/update/{id}', [ControllersSampahController::class, 'update'])->name('updateSampah');
        Route::post('/admin/sampah/store', [ControllersSampahController::class, 'store'])->name('storeSampah');
        Route::post('/admin/sampah/store/image', [ControllersSampahController::class, 'storeImage'])->name('storeImageSampah');
        Route::get('/admin/sampah/detail/{id}', [ControllersSampahController::class, 'show'])->name('detailSampah');

        // TUGAS PERJALANAN
        Route::get('/admin/tugas-perjalanan', [TugasPerjalananController::class, 'index'])->name('tugas-perjalanan');
        Route::get('/admin/tugas-perjalanan/detail/{id}', [TugasPerjalananController::class, 'show'])->name('detailTugas');

        // VALIDASI TABUNGAN
        Route::get('/admin/validasi-tabungan', [ValidasiTabunganController::class, 'index'])->name('validasi-tabungan');
        Route::get('/admin/validasi-tabungan/detail/{id}', [ValidasiTabunganController::class, 'show'])->name('detailValidasi');
        Route::put('/admin/validasi-tabungan/update/{id}', [ValidasiTabunganController::class, 'update'])->name('updateValidasi');

        // PEMBAYARAN IURANS
        Route::get('/admin/pembayaran-iurans', function () {
            return view('pages.pembayaranIurans');
        })->name('pembayaran-iurans');
        Route::put('/admin/pembayaran-iurans/store/{id}', [NasabahController::class, 'pembayaranStore'])->name('pembayaranStore');

        // PENARIKAN SALDO
        Route::get('/admin/penarikan-saldo', [PenarikanController::class, 'index'])->name('penarikan-saldo');
        Route::put('/admin/penarikan-saldo/store/{id}', [PenarikanController::class, 'update'])->name('poinStore');

        // GRAPIK LAPORAN
        Route::get('/admin/grapik-laporan', [GrapikController::class, 'index'])->name('grapik-laporan');
        Route::get('/admin/grapik-laporan/detail/{id}', [GrapikController::class, 'index'])->name('detailGrapik');

        // PUSH NOTIFICATION
        Route::get('/admin/push-notif', [PushNotifController::class, 'index'])->name('push-notif');
        Route::get('/admin/push-notif/detail/{id}', [PushNotifController::class, 'index'])->name('detailPush-notif');

        // BANNER
        Route::get('/admin/banner', [BannerController::class, 'index'])->name('banner');
        Route::get('/admin/banner/detail/{id}', [BannerController::class, 'index'])->name('detailBanner');
    });
    // Route::get('/', [PageController::class, 'loadPage'])->name('dashboard');
    // Route::get('page/{layout}/{pageName}', [PageController::class, 'loadPage'])->name('page');

    Route::group(['middleware' => 'accessrole:ADMIN'], function() {
        // TENTANG APLIKASI
        Route::get('/admin/tentang-aplikasi', [TentangAplikasiController::class, 'index'])->name('tentang-aplikasi');
        Route::get('/admin/tentang-aplikasi/detail/{id}', [TentangAplikasiController::class, 'index'])->name('detailTentang-aplikasi-detail');

        // PANDUAN APLIKASI
        Route::get('/admin/panduan-aplikasi', [TentangAplikasiController::class, 'panduanIndex'])->name('panduan-aplikasi');
        Route::get('/admin/panduan-aplikasi/detail/{id}', [TentangAplikasiController::class, 'panduanIndex'])->name('detailPanduan-aplikasi-detail');

        // SNK APLIKASI
        Route::get('/admin/snk-aplikasi', [TentangAplikasiController::class, 'snkIndex'])->name('snk-aplikasi');
        Route::get('/admin/snk-aplikasi/detail/{id}', [TentangAplikasiController::class, 'snkIndex'])->name('detailTSnk-aplikasi-detail');

        // KONTAK APLIKASI
        Route::get('/admin/kontak', [TentangAplikasiController::class, 'kontakIndex'])->name('kontak');
        Route::get('/admin/kontak/detail/{id}', [TentangAplikasiController::class, 'kontakIndex'])->name('detailKontak-detail');
    });
    
    
    
   
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
