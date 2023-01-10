<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;
    use HasFactory;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'nama_kategori'
    ];
}
