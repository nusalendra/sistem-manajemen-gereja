<?php

namespace App\Http\Controllers\Admin;

use App\Charts\JemaatChart;
use App\Charts\PendaftaranMenungguKonfirmasiChart;
use App\Charts\StatusJemaatChart;
use App\Charts\UmurJemaatChart;
use App\Http\Controllers\Controller;
use App\Models\Baptis;
use App\Models\Jemaat;
use App\Models\Menikah;
use App\Models\Sidi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(JemaatChart $jemaatChart, UmurJemaatChart $umurJemaatChart, StatusJemaatChart $statusJemaatChart)
  {
    $totalJemaat = Jemaat::count();
    $totalMenikah = Menikah::where('status_menikah', 'Sudah Menikah')->count();
    $totalBaptis = Baptis::where('status_baptis', 'Sudah Baptis')->count();
    $totalSidi = Sidi::where('status_sidi', 'Sudah Sidi')->count();
    $pendaftaranMenikah = Menikah::where('status_menikah', 'Menunggu Konfirmasi')->count();
    $pendaftaranBaptis = Baptis::where('status_baptis', 'Menunggu Konfirmasi')->count();
    $pendaftaranSidi = Sidi::where('status_sidi', 'Menunggu Konfirmasi')->count();
    
    return view('content.pages.admin.dashboard.index', compact('totalJemaat', 'totalMenikah', 'totalBaptis', 'totalSidi', 'pendaftaranMenikah', 'pendaftaranBaptis', 'pendaftaranSidi'), ['jemaatChart' => $jemaatChart->build(), 'umurJemaatChart' => $umurJemaatChart->build(), 'statusJemaatChart' => $statusJemaatChart->build()]);
  }
}
