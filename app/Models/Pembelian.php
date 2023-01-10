<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembelian extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'id_supplier',
        'total_item',
        'diskon',
        'total_bayar'
    ];


    public function item()
    {
        return $this->hasMany(Pembelian_Detail::class, 'id_pembelian');
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'id_supplier');
    }
}
