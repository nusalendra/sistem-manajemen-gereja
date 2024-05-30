<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PelayananSepekan;
use App\Models\Pengumuman;
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
        return view('content.pages.admin.warta-jemaat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $wartaJemaat = new WartaJemaat();
        $wartaJemaat->user_id = $user->id;
        $wartaJemaat->tanggal = $request->tanggal;
        $wartaJemaat->judul = $request->judul;
        $wartaJemaat->nama_khutbah = $request->nama_khutbah;
        $wartaJemaat->ayat = $request->ayat;
        $wartaJemaat->isi = $request->isi;
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
        $user = Auth::user();

        $wartaJemaat = WartaJemaat::find($id);
        $wartaJemaat->user_id = $user->id;
        $wartaJemaat->tanggal = $request->tanggal;
        $wartaJemaat->judul = $request->judul;
        $wartaJemaat->nama_khutbah = $request->nama_khutbah;
        $wartaJemaat->ayat = $request->ayat;
        $wartaJemaat->isi = $request->isi;
        $wartaJemaat->save();

        return redirect('/warta-jemaat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = WartaJemaat::find($id);
        $data->delete();

        return redirect('/warta-jemaat');
    }

    public function pelayananSepakanCreate($id) {
        $data = PelayananSepekan::all();

        return view('content.pages.admin.warta-jemaat.pelayanan-sepekan', compact('data', 'id'));
    }

    public function pelayananSepakanStore(Request $request) {
        $data = new PelayananSepekan();
        $data->warta_jemaat_id = $request->warta_jemaat_id;
        $data->hari = $request->hari;
        $data->jam = $request->jam;
        $data->kegiatan = $request->kegiatan;
        $data->firman = $request->firman;
        $data->liturgos = $request->liturgos;
        $data->gitaris = $request->gitaris;
        $data->singer = $request->singer;
        $data->musik = $request->musik;
        $data->save();

        return redirect('/warta-jemaat/pelayanan-sepekan/' . $request->warta_jemaat_id);
    }

    public function pelayananSepakanDestroy($id, Request $request) {
        $data = PelayananSepekan::find($id);
        $data->delete();

        return redirect('/warta-jemaat/pelayanan-sepekan/' . $request->warta_jemaat_id);
    }

    public function pengumumanCreate($id) {
        $data = Pengumuman::all();

        return view('content.pages.admin.warta-jemaat.pengumuman', compact('data', 'id'));
    }

    public function pengumumanStore(Request $request) {
        $data = new Pengumuman();
        $data->warta_jemaat_id = $request->warta_jemaat_id;
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->save();

        return redirect('/warta-jemaat/pengumuman/' . $request->warta_jemaat_id);
    }

    public function pengumumanDestroy($id, Request $request) {
        $data = Pengumuman::find($id);
        $data->delete();

        return redirect('/warta-jemaat/pengumuman/' . $request->warta_jemaat_id);
    }
}
