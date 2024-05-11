<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function store()
    {
        $attributes = request()->validate([
            'username'=>'required',
            'password'=>'required' 
        ]);

        if(Auth::attempt($attributes))
        {
            session()->regenerate();
            if(Auth::user()->role == "Admin") {
                return redirect('/dashboard')->with(['success'=>'Kamu sudah login']);
            } else if(Auth::user()->role == "Jemaat") {
                return redirect('/beranda')->with(['success'=>'Kamu sudah login']);
            }
        }
        else{
            return back()->withErrors(['username'=>'Username atau password anda salah!']);
        }
    }
    
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
