<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailProduk extends Controller
{
    public function index()
    {
        return view('konsumen.detail-produk');
    }
}
