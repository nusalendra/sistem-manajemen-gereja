<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index() {
        return view('content.pages.jemaat.beranda.index');
    }
}
