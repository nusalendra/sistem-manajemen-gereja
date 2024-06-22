<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\PelayananSepekan;
use App\Models\Pengumuman;
use App\Models\WartaJemaat;
use App\Charts\StatusJemaatChart;
use App\Charts\TotalJemaatPriaWanitaChart;
use App\Charts\UmurJemaatChart;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(TotalJemaatPriaWanitaChart $totalJemaatPriaWanitaChart, StatusJemaatChart $statusJemaatChart) {
        $wartaJemaat = WartaJemaat::first();
        $pelayananSepekan = PelayananSepekan::all();
        $pengumuman = Pengumuman::all();

        return view('content.pages.jemaat.beranda.index', compact('wartaJemaat', 'pelayananSepekan', 'pengumuman'), ['totalJemaatPriaWanitaChart' => $totalJemaatPriaWanitaChart->build(), 'statusJemaatChart' => $statusJemaatChart->build()]);
    }
}
