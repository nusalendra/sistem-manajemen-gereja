<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function profilSaya() {
        $user = Auth::user();
        $data = Jemaat::where('user_id', $user->id)->first();

        return view('content.pages.jemaat.beranda.profile.profil-saya', compact('data', 'user'));
    }

    public function riwayat() {
        $user = Auth::user();
        $data = Jemaat::with('menikah')->where('user_id', $user->id)->first();

        return view('content.pages.jemaat.beranda.profile.riwayat', compact('data'));
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
        $user = User::find($id);
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        $jemaat = Jemaat::where('user_id', $id)->first();
        $jemaat->nama_lengkap = $request->nama_lengkap;
        $jemaat->jenis_kelamin = $request->jenis_kelamin;
        $jemaat->tanggal_lahir = $request->tanggal_lahir;
        $jemaat->umur = $request->umur;
        $jemaat->NIK = $request->NIK;
        $jemaat->alamat = $request->alamat;
        $jemaat->nama_ayah = $request->nama_ayah;
        $jemaat->nama_ibu = $request->nama_ibu;
        $jemaat->save();
        
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
