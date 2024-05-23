<?php

namespace App\Http\Controllers\Admin;

use App\Charts\JemaatChart;
use App\Http\Controllers\Controller;
use App\Models\Baptis;
use App\Models\Jemaat;
use App\Models\Menikah;
use App\Models\Sidi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(JemaatChart $jemaatChart)
  {
    $totalJemaat = Jemaat::count();
    $totalMenikah = Menikah::where('status_menikah', 'Sudah Menikah')->count();
    $totalBaptis = Baptis::where('status_baptis', 'Sudah Baptis')->count();
    $totalSidi = Sidi::where('status_sidi', 'Sudah Sidi')->count();
    
    return view('content.pages.admin.dashboard.index', compact('totalJemaat', 'totalMenikah', 'totalBaptis', 'totalSidi'), ['jemaatChart' => $jemaatChart->build()]);
  }
}
