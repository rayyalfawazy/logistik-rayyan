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
}
