<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\Baptis;
use App\Models\Jemaat;
use App\Models\Sidi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranSidiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $data = Jemaat::where('user_id', $user->id)->first();

        return view('content.pages.jemaat.pendaftaran-sidi.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sidi = new Sidi();
        $sidi->jemaat_id = $request->jemaat_id;
        $sidi->gereja_yang_membaptis = $request->gereja_yang_membaptis;
        $sidi->tanggal_sidi = $request->tanggal_sidi;
        $sidi->status_sidi = 'Menunggu Konfirmasi';
        $sidi->save();

        return redirect('/beranda');
    }

    public function cekStatusSidi(Request $request)
    {
        $jemaat_id = $request->jemaat_id;

        $sidi = Sidi::where('jemaat_id', $jemaat_id)->first();
        $baptis = Baptis::where('jemaat_id', $jemaat_id)->first();

        if (!$baptis || $baptis->nomor_baptis == null) {
            return response()->json(['status' => 'Belum Baptis']);
        } elseif ($sidi && $sidi->status_sidi == 'Sudah Sidi') {
            return response()->json(['status' => 'Sudah Sidi']);
        } elseif ($sidi && $sidi->status_sidi == 'Menunggu Konfirmasi') {
            return response()->json(['status' => 'Menunggu Konfirmasi']);
        } elseif ($sidi && $sidi->status_sidi == 'Dikonfirmasi') {
            return response()->json(['status' => 'Dikonfirmasi']);
        } else {
            return response()->json(['status' => 'Belum Sidi']);
        }
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
