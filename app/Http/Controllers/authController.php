<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->intended('/dashboard')->with('success', 'Berhasil masuk');
        }
        return back()->with('failed', 'Email atau password salah');
    }
}
