<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilGerejaController extends Controller
{
  public function index()
  {
    return view('content.pages.profil-gereja.index');
  }
}
