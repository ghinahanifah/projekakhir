<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_barang','nama_barang','harga_barang','jumlah_barang'
    ];
}
