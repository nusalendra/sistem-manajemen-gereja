<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\Baptis;
use App\Models\Jemaat;
use App\Models\Menikah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   */

  public function profilSaya()
  {
    $user = Auth::user();
    $data = Jemaat::where('user_id', $user->id)->first();

    return view('content.pages.jemaat.profile.profil-saya', compact('data', 'user'));
  }

  public function riwayat()
  {
    $user = Auth::user();
    $data = Jemaat::with('menikah')
      ->where('user_id', $user->id)
      ->first();
    $menikah = Menikah::where('jemaat_id', $data->id)
      ->where('status_menikah', '=', 'Sudah Menikah')
      ->first();

    return view('content.pages.jemaat.profile.riwayat', compact('data', 'menikah'));
  }

  public function unduhSertifikatBaptis()
  {
    $user = Auth::user();
    $jemaat = Jemaat::where('user_id', $user->id)->first();
    $data = Baptis::where('jemaat_id', $jemaat->id)->first();

    if ($data->sertifikat) {
      $filePath = public_path('/sertifikat' . '/' . $data->sertifikat);

      if (File::exists($filePath)) {
        return Response::download($filePath);
      }
    }
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $user = User::find($id);
    $user->username = $request->username;
    $user->email = $request->email;

    if ($request->password !== null) {
      $user->password = bcrypt($request->password);
    }

    $user->save();

    $jemaat = Jemaat::where('user_id', $id)->first();
    $jemaat->nama_lengkap = $request->nama_lengkap;
    $jemaat->jenis_kelamin = $request->jenis_kelamin;
    $jemaat->kondisi_tubuh = $request->kondisi_tubuh;
    $jemaat->tempat_lahir = $request->tempat_lahir;
    $jemaat->tanggal_lahir = $request->tanggal_lahir;
    $jemaat->umur = $request->umur;
    $jemaat->NIK = $request->NIK;
    $jemaat->KK = $request->KK;
    $jemaat->nomor_handphone = $request->nomor_handphone;
    $jemaat->alamat = $request->alamat;
    $jemaat->kabupaten = $request->kabupaten;
    $jemaat->provinsi = $request->provinsi;
    $jemaat->golongan_darah = $request->golongan_darah;
    $jemaat->pendidikan = $request->pendidikan;
    $jemaat->pekerjaan = $request->pekerjaan;
    $jemaat->nama_ayah = $request->nama_ayah;
    $jemaat->nama_ibu = $request->nama_ibu;
    $jemaat->save();

    return redirect('/profile');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
