<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request){
        $validate = $request->validate([
            'email' => ['required'],
            'password' =>['required']
        ]);
        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->route('taskIndex')->with('success','berhasil login');
        }
        return back()->withErrors([
            'msg' => 'email atau password yang anda masukkan salah'
        ]);

    }
    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginForm');
    }
}
