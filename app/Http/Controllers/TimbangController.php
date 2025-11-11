<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timbang;

class TimbangController extends Controller
{
    public function index(Request $request)
    {
        $query = Timbang::query();

        if ($request->has(['start_date', 'end_date'])) {
            $query->whereBetween('tanggal_timbang', [$request->start_date, $request->end_date]);
        }
        return response()->json($query->orderBy('tanggal_timbang', 'asc')->get());
    }

    public function destroy($id)
    {
        Timbang::where('id', $id)->delete();
        return response()->json(['message' => 'data berhasil di hapus']);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tgl_benang_masuk' => 'required|date',
            'tanggal_timbang' => 'required|date',
            'qty_kg' => 'required|numeric',
            'sudah_ditimbang' => 'required|numeric',
            'sisa' => 'required|numeric',
            'ttl_bng_wrn' => 'required|string',
            'pic_timbang' => 'required|string',
            'shif' => 'required|string',
        ]);

        $data = Timbang::create($validate);
        return response()->json([
            'message' => 'Data berhasil di tambahkan',
            'data' => $data
        ], 201);
    }
}
