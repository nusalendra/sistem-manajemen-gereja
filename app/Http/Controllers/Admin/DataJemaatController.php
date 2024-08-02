<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Baptis;
use App\Models\Jemaat;
use App\Models\Menikah;
use App\Models\Sidi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataJemaatController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = Jemaat::all();
    return view('content.pages.admin.data-jemaat.index', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('content.pages.admin.data-jemaat.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    if ($request->jenis_jemaat == 'Jemaat Lama') {
      $user = new User();
      $user->username = $request->username;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->role = 'Jemaat';
      $user->save();

      $jemaat = new Jemaat();
      $jemaat->user_id = $user->id;
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
      $jemaat->status_jemaat = 'Hidup';
      $jemaat->save();

      if ($request->filled('tanggal_pernikahan')) {
        $menikah = new Menikah();
        $menikah->jemaat_id = $jemaat->id;
        $menikah->nama_pasangan = $request->nama_pasangan;
        $menikah->jenis_kelamin_pasangan = $request->jenis_kelamin_pasangan;
        $menikah->nama_ayah_pasangan = $request->nama_ayah_pasangan;
        $menikah->nama_ibu_pasangan = $request->nama_ibu_pasangan;
        $menikah->umur_pasangan = $request->umur_pasangan;
        $menikah->tanggal_lahir_pasangan = $request->tanggal_lahir_pasangan;
        $menikah->nomor_baptis_pasangan = $request->nomor_baptis_pasangan;
        $menikah->tanggal_pernikahan = $request->tanggal_pernikahan;
        $menikah->status_menikah = 'Sudah Menikah';
        $menikah->save();
      }

      if ($request->filled('tanggal_baptis')) {
        $baptis = new Baptis();
        $baptis->jemaat_id = $jemaat->id;
        if ($request->hasFile('sertifikat')) {
          $file = $request->file('sertifikat');
          $filename = 'Sertifikat Baptis' . '_' . $jemaat->nama_lengkap . '.' . $file->getClientOriginalExtension();
          $file->move(public_path('sertifikat-baptis'), $filename);
          $baptis->sertifikat = $filename;
        }
        $baptis->tanggal_baptis = $request->tanggal_baptis;
        $baptis->nomor_baptis = $request->nomor_baptis;
        $baptis->status_baptis = 'Sudah Baptis';
        $baptis->save();
      }

      $sidi = null;
      if ($request->filled('tanggal_sidi')) {
        $sidi = new Sidi();
        $sidi->jemaat_id = $jemaat->id;
        $sidi->gereja_yang_membaptis = $request->gereja_yang_membaptis;
        $sidi->tanggal_sidi = $request->tanggal_sidi;
        $sidi->status_sidi = 'Sudah Sidi';
        $sidi->save();
      }
    } else {
      $user = new User();
      $user->username = $request->username;
      $user->password = bcrypt($request->password);
      $user->role = 'Jemaat';
      $user->save();

      $jemaat = new Jemaat();
      $jemaat->user_id = $user->id;
      $jemaat->nama_lengkap = $request->nama_lengkap;
      $jemaat->jenis_kelamin = $request->jenis_kelamin;
      $jemaat->status_jemaat = 'Hidup';
      $jemaat->save();
    }

    return redirect('/data-jemaat');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $data = Jemaat::with('menikah')->find($id);
    $menikah = Menikah::where('jemaat_id', $data->id)
      ->where('status_menikah', '=', 'Sudah Menikah')
      ->get();

    return view('content.pages.admin.data-jemaat.show', compact('data', 'menikah'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $data = Jemaat::find($id);
    $menikah = Menikah::where('jemaat_id', $data->id)
      ->where('status_menikah', '=', 'Sudah Menikah')
      ->get();

    return view('content.pages.admin.data-jemaat.edit', compact('data', 'menikah'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // Handle Update Data Jemaat
    $jemaat = Jemaat::find($id);
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
    $jemaat->status_jemaat = $request->status_jemaat;
    $jemaat->save();

    // Handle Update Data User
    $user = User::where('id', $jemaat->user_id)->first();
    $user->username = $request->username;
    $user->email = $request->email;

    if ($request->password !== null) {
      $user->password = bcrypt($request->password);
    }

    $user->save();

    // Handle Update / Create Data Menikah
    if ($request->has('menikah')) {
      foreach ($request->input('menikah') as $index => $menikahData) {
        // Check if any field is not null or empty
        if (
          !empty($menikahData['nama_pasangan']) ||
          !empty($menikahData['umur_pasangan']) ||
          !empty($menikahData['nama_ayah_pasangan']) ||
          !empty($menikahData['nama_ibu_pasangan']) ||
          !empty($menikahData['tanggal_lahir_pasangan']) ||
          !empty($menikahData['nomor_baptis_pasangan']) ||
          !empty($menikahData['tanggal_pernikahan'])
        ) {
          Menikah::updateOrCreate(
            ['id' => $menikahData['id'] ?? null, 'jemaat_id' => $jemaat->id],
            [
              'jemaat_id' => $jemaat->id,
              'nama_pasangan' => $menikahData['nama_pasangan'],
              'jenis_kelamin_pasangan' => $menikahData['jenis_kelamin_pasangan'],
              'umur_pasangan' => $menikahData['umur_pasangan'],
              'nama_ayah_pasangan' => $menikahData['nama_ayah_pasangan'],
              'nama_ibu_pasangan' => $menikahData['nama_ibu_pasangan'],
              'tanggal_lahir_pasangan' => $menikahData['tanggal_lahir_pasangan'],
              'nomor_baptis_pasangan' => $menikahData['nomor_baptis_pasangan'],
              'tanggal_pernikahan' => $menikahData['tanggal_pernikahan'],
              'status_menikah' => $menikahData['status_menikah'] ?? 'Sudah Menikah',
            ]
          );
        }
      }
    }

    // Handle Update / Create Data Baptis
    if ($request->tanggal_baptis !== null || $request->nomor_baptis !== null) {
      $dataBaptis = [
        'jemaat_id' => $jemaat->id,
        'tanggal_baptis' => $request->tanggal_baptis,
        'nomor_baptis' => $request->nomor_baptis,
      ];

      $baptis = Baptis::where('jemaat_id', $jemaat->id)->first();

      if ($request->hasFile('sertifikat')) {
        $file = $request->file('sertifikat');
        $filename = 'Sertifikat Baptis' . '_' . $jemaat->nama_lengkap . '.' . $file->getClientOriginalExtension();

        if ($baptis && $baptis->sertifikat) {
          File::delete(public_path('sertifikat-baptis/' . $baptis->sertifikat));
        }

        $file->move(public_path('sertifikat-baptis'), $filename);
        $dataBaptis['sertifikat'] = $filename;
      }

      $baptis = Baptis::updateOrCreate(['jemaat_id' => $jemaat->id], $dataBaptis);

      if ($baptis) {
        $baptis->status_baptis = 'Sudah Baptis';
        $baptis->save();
      }
    }

    // Handle Update / Create Data Sidi
    if ($request->gereja_yang_membaptis !== null || $request->tanggal_sidi !== null) {
      $dataSidi = [
        'jemaat_id' => $jemaat->id,
        'gereja_yang_membaptis' => $request->gereja_yang_membaptis,
        'tanggal_sidi' => $request->tanggal_sidi,
      ];

      $sidi = Sidi::updateOrCreate(['jemaat_id' => $jemaat->id], $dataSidi);

      if ($sidi) {
        $sidi->status_sidi = 'Sudah Sidi';
        $sidi->save();
      }
    }

    return redirect('/data-jemaat');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $data = Jemaat::find($id);
    $user = User::where('id', $data->user_id)->first();

    $baptis = Baptis::where('jemaat_id', $data->id)->first();
    if ($baptis) {
      File::delete(public_path('sertifikat-baptis/' . $baptis->sertifikat));
    }

    $user->delete();
    $data->delete();

    return redirect('/data-jemaat');
  }
}
