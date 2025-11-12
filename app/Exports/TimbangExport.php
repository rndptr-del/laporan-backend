<?php

namespace App\Exports;

use App\Models\Timbang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TimbangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Timbang::select(
            'tgl_benang_masuk',
            'tanggal_timbang',
            'qty_kg',
            'sudah_ditimbang',
            'sisa',
            'ttl_bng_wrn',
            'pic_timbang',
            'shif'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal Benang Masuk',
            'Tanggal Timbang',
            'Qty',
            'Sudah Ditimbang',
            'Sisa',
            'Total Benang Warna',
            'Pic Timbang',
            'Shif',
        ];
    }
}
