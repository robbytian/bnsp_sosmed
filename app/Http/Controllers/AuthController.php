<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * fucntion loginView() digunakan untuk menampilkan halaman login
     */

    public function loginView()
    {
        return view('auth.login');
    }

    /**
     * function authenticate() digunakan untuk memvalidasi inputan email dan password user,
     * bila data valid maka akan masuk ke halaman beranda, jika tidak maka muncul pesan error
     */

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/beranda');
        } else {
            toast('Email atau Password Salah', 'error');
            return back()->withInput();
        }
    }

    /**
     * function logout() merupakan fungsi yang digunakan untuk melakukan logout dari sistem
     */

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
