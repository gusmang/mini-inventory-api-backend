<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'total_item',
        'diskon',
        'total_bayar',
        'diterima'
    ];


    public function item()
    {
        return $this->hasMany(Penjualan_Detail::class, 'id_penjualan');
    }
}
