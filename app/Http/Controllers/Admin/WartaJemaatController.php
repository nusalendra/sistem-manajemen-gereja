<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WartaJemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WartaJemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WartaJemaat::all();
        return view('content.pages.admin.warta-jemaat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.pages.admin.warta-jemaat.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $wartaJemaat = new WartaJemaat();
        $wartaJemaat->user_id = $user->id;
        $wartaJemaat->judul = $request->judul;
        $wartaJemaat->ayat = $request->ayat;
        $wartaJemaat->hari = $request->hari;
        $wartaJemaat->jam = $request->jam;
        $wartaJemaat->nama_khutbah = $request->nama_khutbah;
        $wartaJemaat->tempat = $request->tempat;
        $wartaJemaat->liturgos = $request->liturgos;
        $wartaJemaat->save();

        return redirect('/warta-jemaat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = WartaJemaat::find($id);
        return view('content.pages.admin.warta-jemaat.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = WartaJemaat::find($id);
        return view('content.pages.admin.warta-jemaat.edit', compact('data'));
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
