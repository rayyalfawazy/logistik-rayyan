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

        // Periksa apakah kode_barang sudah ada di tabel barang_masuk
        $existingBarangMasuk = BarangMasuk::where('kode_barang', $request->kode_barang)->first();

        if ($existingBarangMasuk) {
            $existingBarangMasuk->quantity = $request->quantity;
            $existingBarangMasuk->nama_barang = $request->nama_barang;
            $existingBarangMasuk->origin = $request->origin ?: $existingBarangMasuk->origin;
            $existingBarangMasuk->tanggal_masuk = $request->tanggal_masuk;
            $existingBarangMasuk->save();

            $stok = StokBarang::where('kode_barang', $request->kode_barang)->first();
            if ($stok) {
                $stok->quantity = $request->quantity;
                $stok->nama_barang = $request->nama_barang;
                $stok->save();
            }
        } else {
            BarangMasuk::create($request->all());

            // Tambahkan atau perbarui stok barang
            $stok = StokBarang::firstOrCreate(
                ['kode_barang' => $request->kode_barang],
                ['nama_barang' => $request->nama_barang]
            );
            $stok->quantity += $request->quantity;
            $stok->save();
        }
        return redirect()->route('barang-masuk')->with('success', 'Barang masuk berhasil diproses.');
    }
}