<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'quantity',
        'destination',
        'tanggal_keluar',
    ];

    public $timestamps = false;

    // Relasi ke StokBarang
    public function stokBarang()
    {
        return $this->belongsTo(StokBarang::class, 'kode_barang', 'kode_barang');
    }

    // Event creating
    protected static function booted()
    {
        static::creating(function ($barangKeluar) {
            if (!$barangKeluar->nama_barang) { // Jika nama_barang belum diisi
                $stokBarang = StokBarang::where('kode_barang', $barangKeluar->kode_barang)->first();
                $barangKeluar->nama_barang = $stokBarang ? $stokBarang->nama_barang : 'N/A';
            }
        });
    }
}
