<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'quantity',
        'origin',
        'tanggal_masuk',
    ];

    public $timestamps = false;

    // Relasi ke StokBarang
    public function stokBarang()
    {
        return $this->belongsTo(StokBarang::class, 'kode_barang', 'kode_barang');
    }
}