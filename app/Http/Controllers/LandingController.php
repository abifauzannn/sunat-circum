<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Dokter;
use App\Models\Fasilitas;
use App\Models\Klinik;
use App\Models\Lokasi;
use App\Models\Metode;
use App\Models\Paket;
use App\Models\Promo;
use App\Models\Review;
use App\Models\Service;
use App\Models\Testimoni;
use App\Models\Why;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
{
    $klinik = Klinik::first(); // karena kamu pakai save() untuk single data
    $why = Why::get();
    $review = Review::get();
    $service = Service::get();
    $banner = Banner::get();
    $paket = Paket::get();
    $fasilitas = Fasilitas::get();
    $dokter = Dokter::get();
    $testimonis = Testimoni::get();
    $promo = Promo::get();
    $lokasi = Lokasi::get();
    $metode = Metode::get();
    return view('landing.index', compact('why', 'klinik', 'review', 'service', 'banner', 'paket', 'fasilitas', 'dokter', 'testimonis', 'promo', 'lokasi', 'metode'));
}

}
