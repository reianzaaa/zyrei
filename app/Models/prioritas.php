<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prioritas extends Model
{
    use HasFactory;

    protected  $fillable = [
        'nama_paket',
        'hari_paket',
        'id_paket',
        'harga',
        'hari',
        'grup',
        'hasil',
        'keterangan',
    ];
}
