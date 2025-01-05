<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\StokBarang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with('stokBarang')->get();
        return view('barang-keluar.index', compact('barangKeluar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'quantity' => 'required|integer|min:1',
            'destination' => 'nullable',
            'tanggal_keluar' => 'required|date',
        ]);

        // Cek stok barang dan tampilkan error
        $stok = StokBarang::where('kode_barang', $request->kode_barang)->first();
        if (!$stok) {
            return redirect()->route('barang-keluar')->withErrors('Barang tidak ditemukan di stok.');
        }

        if ($stok->quantity < $request->quantity) {
            return redirect()->route('barang-keluar')->withErrors('Stok barang tidak mencukupi.');
        }

        // Tambahkan catatan barang keluar
        BarangKeluar::create($request->all());

        // Kurangi stok barang
        $stok->quantity -= $request->quantity;

        // Jika stok habis, hapus barang dari stok barang
        if ($stok->quantity <= 0) {
            $stok->delete();
        } else {
            $stok->save();
        }

        return redirect()->route('barang-keluar')->with('success', 'Barang keluar berhasil diproses.');
    }
}