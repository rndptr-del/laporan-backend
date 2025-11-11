<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timbang extends Model
{
   use HasFactory;

    protected $table = 'timbang';

    protected $fillable = [
        'tgl_benang_masuk',
        'tanggal_timbang',
        'qty_kg',
        'sudah_ditimbang',
        'sisa',
        'ttl_bng_wrn',
        'pic_timbang',
        'shif',
    ];

}
