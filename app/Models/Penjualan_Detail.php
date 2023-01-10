<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_penjualan',
        'id_barang',
        'nama_produk',
        'harga_jual',
        'qty',
        'sub_total'
    ];
}
