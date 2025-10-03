<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\KlinikController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MetodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KomponenController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PaketKomponenController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\WhyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/klinik', [KlinikController::class, 'form'])->name('klinik.form');
Route::post('/klinik', [KlinikController::class, 'save'])->name('klinik.save');

Route::get('/metodes', [MetodeController::class, 'index'])->name('metodes.index');
Route::get('/metodes/create', [MetodeController::class, 'create'])->name('metodes.create');
Route::post('/metodes', [MetodeController::class, 'store'])->name('metodes.store');
Route::get('/metodes/{id}', [MetodeController::class, 'show'])->name('metodes.show');
Route::get('/metodes/{id}/edit', [MetodeController::class, 'edit'])->name('metodes.edit');
Route::put('/metodes/{id}', [MetodeController::class, 'update'])->name('metodes.update');
Route::delete('/metodes/{id}', [MetodeController::class, 'destroy'])->name('metodes.destroy');



Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');


Route::get('/komponen', [KomponenController::class, 'index'])->name('komponens.index');
Route::get('/komponen/create', [KomponenController::class, 'create'])->name('komponens.create');
Route::post('/komponen', [KomponenController::class, 'store'])->name('komponens.store');
Route::get('/komponen/{id}/edit', [KomponenController::class, 'edit'])->name('komponens.edit');
Route::put('/komponen/{id}', [KomponenController::class, 'update'])->name('komponens.update');
Route::delete('/komponen/{id}', [KomponenController::class, 'destroy'])->name('komponens.destroy');


// Paket
Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create');
Route::post('/paket', [PaketController::class, 'store'])->name('paket.store');
Route::get('/paket/{paket}/edit', [PaketController::class, 'edit'])->name('paket.edit');
Route::put('/paket/{paket}', [PaketController::class, 'update'])->name('paket.update');
Route::delete('/paket/{paket}', [PaketController::class, 'destroy'])->name('paket.destroy');


// Paket-Komponen
    Route::get('/paket-komponen', [PaketKomponenController::class, 'index'])->name('paket-komponen.index');
    Route::get('/paket-komponen/create', [PaketKomponenController::class, 'create'])->name('paket-komponen.create');
    Route::post('/paket-komponen', [PaketKomponenController::class, 'store'])->name('paket-komponen.store');
    Route::get('/paket-komponen/{id}/edit', [PaketKomponenController::class, 'edit'])->name('paket-komponen.edit');
    Route::put('/paket-komponen/{id}', [PaketKomponenController::class, 'update'])->name('paket-komponen.update');
    Route::delete('/paket-komponen/{id}', [PaketKomponenController::class, 'destroy'])->name('paket-komponen.destroy');


Route::get('/why', [WhyController::class, 'index'])->name('why.index');
Route::get('/why/create', [WhyController::class, 'create'])->name('why.create');
Route::post('/why', [WhyController::class, 'store'])->name('why.store');
Route::get('/why/{id}/edit', [WhyController::class, 'edit'])->name('why.edit');
Route::put('/why/{id}', [WhyController::class, 'update'])->name('why.update');
Route::delete('/why/{id}', [WhyController::class, 'destroy'])->name('why.destroy');


Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');


// Tampilkan semua layanan
Route::get('/layanans', [ServiceController::class, 'index'])->name('layanans.index');
Route::get('/layanans/create', [ServiceController::class, 'create'])->name('layanans.create');
Route::post('/layanans', [ServiceController::class, 'store'])->name('layanans.store');
Route::get('/layanans/{service}/edit', [ServiceController::class, 'edit'])->name('layanans.edit');
Route::put('/layanans/{service}', [ServiceController::class, 'update'])->name('layanans.update');
Route::delete('/layanans/{service}', [ServiceController::class, 'destroy'])->name('layanans.destroy');




Route::get('/banner', [BannerController::class, 'edit'])->name('banner.edit');
Route::put('/banner', [BannerController::class, 'update'])->name('banner.update');


Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
Route::post('/fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
Route::get('/fasilitas/{fasilitas}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
Route::put('/fasilitas/{fasilitas}', [FasilitasController::class, 'update'])->name('fasilitas.update');
Route::delete('/fasilitas/{fasilitas}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');

Route::get('/dokter', [DokterController::class, 'index'])->name('dokters.index');
Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokters.create');
Route::post('/dokter', [DokterController::class, 'store'])->name('dokters.store');
Route::get('/dokter/{dokter}/edit', [DokterController::class, 'edit'])->name('dokters.edit');
Route::put('/dokter/{dokter}', [DokterController::class, 'update'])->name('dokters.update');
Route::delete('/dokter/{dokter}', [DokterController::class, 'destroy'])->name('dokters.destroy');

Route::get('/testimoni', [TestimoniController::class, 'edit'])->name('testimoni.edit');
Route::put('/testimoni', [TestimoniController::class, 'update'])->name('testimoni.update');

Route::get('/promo', [PromoController::class, 'edit'])->name('promo.edit');
Route::post('/promo/update', [PromoController::class, 'update'])->name('promo.update');

Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
Route::get('/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
Route::post('/lokasi', [LokasiController::class, 'store'])->name('lokasi.store');
Route::get('/lokasi/{lokasi}', [LokasiController::class, 'show'])->name('lokasi.show');
Route::get('/lokasi/{lokasi}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
Route::put('/lokasi/{lokasi}', [LokasiController::class, 'update'])->name('lokasi.update');
Route::delete('/lokasi/{lokasi}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');




});

require __DIR__.'/auth.php';
