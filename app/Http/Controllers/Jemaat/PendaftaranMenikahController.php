<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use App\Models\Menikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranMenikahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = Jemaat::where('user_id', $user->id)->first();

        return view('content.pages.jemaat.pendaftaran-menikah.create', compact('data'));
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
        $pendaftaran = new Menikah();
        $pendaftaran->jemaat_id = $request->jemaat_id;
        $pendaftaran->nama_pasangan = $request->nama_pasangan;
        $pendaftaran->jenis_kelamin_pasangan = $request->jenis_kelamin_pasangan;
        $pendaftaran->umur_pasangan = $request->umur_pasangan;
        $pendaftaran->tanggal_lahir_pasangan = $request->tanggal_lahir_pasangan;
        $pendaftaran->nomor_baptis_pasangan = $request->nomor_baptis_pasangan;
        $pendaftaran->nama_ayah_pasangan = $request->nama_ayah_pasangan;
        $pendaftaran->nama_ibu_pasangan = $request->nama_ibu_pasangan;
        $pendaftaran->tanggal_pernikahan = $request->tanggal_pernikahan;
        $pendaftaran->status_menikah = 'Menunggu Konfirmasi';
        $pendaftaran->save();

        return redirect('/beranda');
    }

    public function cekStatusMenikah(Request $request)
    {
        $jemaat_id = $request->jemaat_id;

        $menikah = Menikah::where('jemaat_id', $jemaat_id)->first();
        
        if ($menikah && $menikah->status_menikah == 'Sudah Menikah') {
            return response()->json(['status' => 'Sudah Menikah']);
        } elseif ($menikah && $menikah->status_menikah == 'Menunggu Konfirmasi') {
            return response()->json(['status' => 'Menunggu Konfirmasi']);
        } else {
            return response()->json(['status' => 'Cerai']);
        }
        // elseif($menikah && $menikah->status_menikah == 'Menunggu Konfirmasi') {
        //     return response()->json(['status' => 'Menunggu Konfirmasi']); 
        // }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
