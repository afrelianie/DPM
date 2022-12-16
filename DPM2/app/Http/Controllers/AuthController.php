<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    function proses_login()
    {

        if (Auth()->attempt(['name' => request('name'), 'password' => request('password')])) {
            return redirect('admin')->with('success', 'login berhasil');
        } else {
            return back()->with('danger', 'login gagal, silahkan cek username dan password anda');
        }
    }
}
