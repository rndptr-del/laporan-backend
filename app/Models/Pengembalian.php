<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';

    protected $fillable = [
        'tanggal_timbang',
        'tanggal_pengembalian',
        'tanggal_transfer',
        'qty_kg',
        'qty_kantong',
        'pic',
        'shif'
    ];
}
