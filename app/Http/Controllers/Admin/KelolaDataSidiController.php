<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sidi;
use Illuminate\Http\Request;

class KelolaDataSidiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sidi::all();
        
        return view('content.pages.admin.kelola-data-sidi.index', compact('data'));
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
        $data = Sidi::find($id);
        
        return view('content.pages.admin.kelola-data-sidi.show', compact('data'));
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
        $sidi = Sidi::find($id);
        
        if ($request->action == 'konfirmasi_sidi') {
            $sidi->status_sidi = 'Dikonfirmasi';
        } elseif ($request->action == 'tolak_sidi') {
            $sidi->status_sidi = 'Pendaftaran Sidi Ditolak';
        } elseif ($request->action == 'dikonfirmasi') {
            $sidi->status_sidi = 'Sudah Sidi';
        }

        $sidi->save();

        return redirect('/kelola-data-sidi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
