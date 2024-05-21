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
        $data = Baptis::where('status_baptis', '=', 'Menunggu Konfirmasi')->get();
        
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
            $baptis->status_baptis = 'Sudah Baptis';
        } elseif ($request->action == 'tolak_baptis') {
            $baptis->status_baptis = 'Pendaftaran Baptis Ditolak';
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
