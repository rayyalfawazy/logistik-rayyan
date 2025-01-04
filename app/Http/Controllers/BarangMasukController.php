<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\StokBarang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::all();
        return view('barang-masuk.index', compact('barangMasuk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required|string',
            'quantity' => 'required|integer',
            'origin' => 'nullable|string',
            'tanggal_masuk' => 'required|date',
        ]);

        // Simpan ke tabel barang masuk
        BarangMasuk::create($request->all());

        // Tambahkan atau perbarui stok barang
        $stok = StokBarang::firstOrCreate(
            ['kode_barang' => $request->kode_barang],
            ['nama_barang' => $request->nama_barang]
        );
        $stok->quantity += $request->quantity;
        $stok->save();

        return redirect()->route('barang-masuk')->with('success', 'Barang masuk berhasil ditambahkan.');
    }
}