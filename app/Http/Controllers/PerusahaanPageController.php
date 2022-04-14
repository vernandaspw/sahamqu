<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerusahaanPageController extends Controller
{
    public function index()
    {
        return view('pages.kelolaperusahaan');
    }
}
