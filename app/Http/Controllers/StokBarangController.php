<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;

class StokBarangController extends Controller
{
    public function index()
    {
        $stokBarang = StokBarang::all();
        return view('stok-barang.index', compact('stokBarang'));
    }
}