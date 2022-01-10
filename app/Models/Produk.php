<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'kategori',
        'pabrikan',
        'tanggal_produksi',
        'tanggal_kedaluwarsa',
        'harga',
        'jumlah_stok'
    ];

}
