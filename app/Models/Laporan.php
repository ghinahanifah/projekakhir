<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'user_id','nama','harga_barang','gambar'
    ];
}
