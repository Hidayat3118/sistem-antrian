<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;#
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function login(Request $request) {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        

        if(Auth::guard('admin')->attempt($validateData)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/profil');
        }

        return back()->with('error', 'Login Gagal, Username atau Password salah !!');
    }
}
