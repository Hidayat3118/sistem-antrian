<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;#
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{

    public function viewLogin(){
        return view('admin.login', [
            'title' => 'Admin | Login'
        ]);
    }
    public function login(Request $request) {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        

        if(Auth::guard('admin')->attempt($validateData)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/profil');
        }

    return back()->with('error', 'Login Gagal !!');
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('/admin/login');
    }

    public function update(Request $request, Admin $admin){
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'nullable|max:255',
        ]);

        if($validateData['password']){
            $validateData['password'] = Hash::make($validateData['password']);
        } else {
            unset($validateData['password']);
        }

        Admin::where('id', $admin->id)->update($validateData);

        return back()->with('success', 'Profil berhasil diubah');
    }
}
