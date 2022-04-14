<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaPageController extends Controller
{
    public function index()
    {
        return view('pages.beranda');
    }
}
