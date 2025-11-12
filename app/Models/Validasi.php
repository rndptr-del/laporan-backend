<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validasi extends Model
{
    use HasFactory;
    protected $table = 'validasi';
    
    protected $fillable = [
        'item_code',
        'batch_number',
        'qty',
        'bin_location_sap',
        'cones',
        'bin_location',
        'remarks',
        'status',
        'waktu_kembali',
        'Pic',
        'pictimbang',
        'tanggal',
    ];

}
