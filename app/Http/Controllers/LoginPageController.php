<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginPageController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function daftar()
    {
        return view('pages.daftar');
    }

    public function daftarakun(Request $request)
    {
        $request->validate([
            'nama' => 'max:30|required',
            'email' => 'email|required|max:100',
            'password' => 'required|min:5|max:30',
        ]);

        $cek = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'user',
            'isAktif' => true
        ]);

        if ($cek) {
            Auth::login($cek);

            return redirect('beranda')->with('msg_success', 'berhasil buat akun');
        } else {
            return redirect()->back()->with('msg_error', 'gagal membuat akun');
        }
    }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $credentials = $req->only('email', 'password');
        $auth = Auth::attempt([
            'email' => $req->email,
            'password' => $req->password,
            'isAktif' => 1
        ], true);
        if ($auth) {
            return redirect('beranda');
        } else {
            return redirect()->back()->with('msg_error', 'Username atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
