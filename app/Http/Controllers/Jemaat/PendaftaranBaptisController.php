<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\Baptis;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranBaptisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $data = Jemaat::where('user_id', $user->id)->first();

        return view('content.pages.jemaat.pendaftaran-baptis.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $baptis = new Baptis();
        $baptis->jemaat_id = $request->jemaat_id;
        $baptis->tanggal_baptis = $request->tanggal_baptis;
        $baptis->status_baptis = 'Menunggu Konfirmasi';
        $baptis->save();

        return redirect('/beranda');
    }

    public function cekStatusBaptis(Request $request)
    {
        $jemaat_id = $request->jemaat_id;

        $baptis = Baptis::where('jemaat_id', $jemaat_id)->first();
        
        if ($baptis && $baptis->status_baptis == 'Sudah Baptis') {
            return response()->json(['status' => 'Sudah Baptis']);
        } elseif ($baptis && $baptis->status_baptis == 'Menunggu Konfirmasi') {
            return response()->json(['status' => 'Menunggu Konfirmasi']);
        } else {
            return response()->json(['status' => 'Belum Baptis']);
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
