<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\WartaJemaat;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index() {
        $wartaJemaat = WartaJemaat::first();
        
        return view('content.pages.jemaat.beranda.index', compact('wartaJemaat'));
    }
}
