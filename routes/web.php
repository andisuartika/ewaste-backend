<?php

use App\Http\Controllers\API\SampahController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FCMController;
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
use App\Models\Artikel;
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
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        
        // NASABAH
        Route::get('/admin/nasabah', [NasabahController::class, 'index'])->name('nasabah');
        Route::get('/admin/nasabah/detail/{id}', [NasabahController::class, 'show'])->name('detailNasabah');
        Route::get('/admin/nasabah/print/{id}', [NasabahController::class, 'print'])->name('printNasabah');
        Route::put('/admin/nasabah/update/{id}', [NasabahController::class, 'update'])->name('updateNasabah');
        Route::get('/admin/nasabah/delete/{id}', [NasabahController::class, 'destroy'])->name('deleteNasabah');

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

        // GRAFIK LAPORAN
        Route::get('/admin/grafik-laporan', [GrapikController::class, 'index'])->name('grafik-laporan');

        // PUSH NOTIFICATION
        Route::get('/admin/push-notif', [PushNotifController::class, 'index'])->name('push-notif');
        Route::get('/admin/push-notif/detail/{id}', [PushNotifController::class, 'index'])->name('detailPush-notif');

        // BANNER
        Route::get('/admin/banner', [BannerController::class, 'index'])->name('banner');
        Route::get('/admin/banner/create', [BannerController::class, 'create'])->name('createBanner');
        Route::get('/admin/banner/detail/{id}', [BannerController::class, 'index'])->name('detailBanner');
        Route::post('/admin/banner/store', [BannerController::class, 'store'])->name('storeBanner');
        Route::post('/admin/banner/store/image', [BannerController::class, 'storeImage'])->name('storeImageBanner');
        Route::get('/admin/banner/{id}/edit', [BannerController::class, 'edit'])->name('editBanner');
        Route::put('/admin/banner/update/{id}', [BannerController::class, 'update'])->name('updateBanner');
    });
    // Route::get('/', [PageController::class, 'loadPage'])->name('dashboard');
    // Route::get('page/{layout}/{pageName}', [PageController::class, 'loadPage'])->name('page');

    Route::group(['middleware' => 'accessrole:ADMIN'], function() {
        // ARTIKEL
        Route::get('admin/artikel',[ArtikelController::class, 'index'])->name('artikel');
        Route::get('admin/artikel/create',[ArtikelController::class, 'create'])->name('artikelCreate');
        Route::post('admin/artikel/store', [ArtikelController::class, 'store'])->name('storeArtikel');
        Route::post('admin/artikel/store/image', [ArtikelController::class, 'storeImage'])->name('storeImageArtikel');
        Route::get('admin/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('editArtikel');
        Route::put('admin/artikel/update/{id}', [ArtikelController::class, 'update'])->name('updateArtikel');
        Route::get('admin/artikel/delete/{id}', [ArtikelController::class, 'destroy'])->name('deleteArtikel');

        // TENTANG APLIKASI
        Route::get('/admin/tentang-aplikasi', [TentangAplikasiController::class, 'index'])->name('tentang-aplikasi');
        Route::post('/admin/tentang-aplikasi/store', [TentangAplikasiController::class, 'tentangStore'])->name('storeTentang');
        Route::put('/admin/tentang-aplikasi/update/{id}', [TentangAplikasiController::class, 'tentangUpdate'])->name('updateTentang');

        // PANDUAN APLIKASI
        Route::get('/admin/panduan-aplikasi', [TentangAplikasiController::class, 'panduanIndex'])->name('panduan-aplikasi');
        Route::post('/admin/panduan-aplikasi/store', [TentangAplikasiController::class, 'panduanStore'])->name('storePanduan');
        Route::put('/admin/panduan-aplikasi/update/{id}', [TentangAplikasiController::class, 'panduanUpdate'])->name('updatePanduan');

        // SNK APLIKASI
        Route::get('/admin/snk-aplikasi', [TentangAplikasiController::class, 'snkIndex'])->name('snk-aplikasi');
        Route::post('/admin/snk-aplikasi/store', [TentangAplikasiController::class, 'syaratStore'])->name('storeSyarat');
        Route::put('/admin/snk-aplikasi/update/{id}', [TentangAplikasiController::class, 'syaratUpdate'])->name('updateSyarat');

        // KONTAK APLIKASI
        Route::get('/admin/kontak', [TentangAplikasiController::class, 'kontakIndex'])->name('kontak');
        Route::post('/admin/kontak/store', [TentangAplikasiController::class, 'kontakStore'])->name('storeKontak');
        Route::put('/admin/kontak/update/{id}', [TentangAplikasiController::class, 'kontakUpdate'])->name('updateKontak');

        // PROFILE
        Route::get('admin/profile', [PetugasController::class, 'profile'])->name('profile');
        Route::post('admin/profile/image', [PetugasController::class, 'storeImage']);
        Route::get('admin/profile/change-password', [PetugasController::class, 'changePassword']);
        Route::put('admin/profile/update-password', [PetugasController::class, 'updatePassword'])->name('updatePassword');

        // FCM
        Route::post('admin/push-notification',[PushNotifController::class, 'send'])->name('sendFCM');
        Route::get('admin/push-notif/create',[PushNotifController::class, 'create'])->name('createFCM');
        Route::post('/admin/notification/store/image',[PushNotifController::class, 'storeImage']);
    });
    
    
    
   
});

Route::get('/artikel', [ArtikelController::class, 'artikel']);
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikelShow');
