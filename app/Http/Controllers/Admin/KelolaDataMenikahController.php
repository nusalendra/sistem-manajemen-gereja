<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menikah;
use Illuminate\Http\Request;

class KelolaDataMenikahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Menikah::all();
        return view('content.pages.admin.kelola-data-menikah.index', compact('data'));
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
        $data = Menikah::find($id);
        // dd($data);
        return view('content.pages.admin.kelola-data-menikah.show', compact('data'));
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
        $menikah = Menikah::find($id);

        if ($request->action == 'konfirmasi_pengajuan_menikah') {
            $menikah->status_menikah = 'Dikonfirmasi';
        } elseif ($request->action == 'tolak_pengajuan_menikah') {
            $menikah->status_menikah = 'Pendaftaran Menikah Ditolak';
        } elseif ($request->action == 'dikonfirmasi') {
            $menikah->status_menikah = 'Sudah Menikah';
        } 

        $menikah->save();

        return redirect('/kelola-data-menikah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
