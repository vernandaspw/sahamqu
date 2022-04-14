<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPageController extends Controller
{
    public function index()
    {
        return view('pages.login');
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
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
