<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index($perusahaan)
    {
        $id = $perusahaan;
        return view('pages.transaksi', compact('id'));
    }
}
