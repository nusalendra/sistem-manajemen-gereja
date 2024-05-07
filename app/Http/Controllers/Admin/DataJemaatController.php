<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use App\Models\User;
use Illuminate\Http\Request;

class DataJemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jemaat::all();
        return view('content.pages.admin.data-jemaat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.pages.admin.data-jemaat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = 'Jemaat';
        $user->save();

        $jemaat = new Jemaat();
        $jemaat->user_id = $user->id;
        $jemaat->nama_lengkap = $request->nama_lengkap;
        $jemaat->jenis_kelamin = $request->jenis_kelamin;
        $jemaat->status_jemaat = 'Hidup';
        $jemaat->save();

        return redirect('/data-jemaat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Jemaat::find($id);
        return view('content.pages.admin.data-jemaat.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Jemaat::find($id);
        return view('content.pages.admin.data-jemaat.edit', compact('data'));
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
        $data = Jemaat::find($id);
        $user = User::where('id', $data->user_id)->first();
        
        $user->delete();
        $data->delete();

        return redirect('/data-jemaat');
    }
}
