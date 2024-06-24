<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Baptis;
use Illuminate\Http\Request;

class KelolaDataBaptisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Baptis::all();
        
        return view('content.pages.admin.kelola-data-baptis.index', compact('data'));
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
        $data = Baptis::find($id);
        
        return view('content.pages.admin.kelola-data-baptis.show', compact('data'));
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
        $baptis = Baptis::find($id);
        
        if ($request->action == 'konfirmasi_baptis') {
            $baptis->status_baptis = 'Dikonfirmasi';
        } elseif ($request->action == 'tolak_baptis') {
            $baptis->status_baptis = 'Pendaftaran Baptis Ditolak';
        } elseif($request->action == 'dikonfirmasi') {
            if ($request->hasFile('sertifikat')) {
                $file = $request->file('sertifikat');
                $filename = $baptis->jemaat->nama_lengkap . '_' . $baptis->tanggal_baptis . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('sertifikat'), $filename);
                $baptis->sertifikat = $filename;
            }
            $baptis->nomor_baptis = $request->nomor_baptis;
            $baptis->nama_pendeta = $request->nama_pendeta;
            $baptis->status_baptis = 'Sudah Baptis';
        }

        $baptis->save();

        return redirect('/kelola-data-baptis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
