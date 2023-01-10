<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_pembelian',
        'id_barang',
        'nama_produk',
        'harga_beli',
        'qty',
        'sub_total'
    ];
}
