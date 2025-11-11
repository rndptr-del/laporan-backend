<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;

class PengembalianController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengembalian::query();

        if ($request->has(['start_date', 'end_date'])) {
            $query->whereBetween('tanggal_pengembalian', [$request->start_date, $request->end_date]);
        }
        return response()->json($query->orderBy('tanggal_pengembalian', 'asc')->get());
    }

    public function destroy($id)
    {
        Pengembalian::where('id', $id)->delete();
        return response()->json(['message' => 'data berhasil di hapus']);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal_timbang' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
            'tanggal_transfer' => 'required|date',
            'qty_kg' => 'required|numeric',
            'qty_kantong' => 'required|integer',
            'pic' => 'required|string',
            'shif' => 'required|string',
        ]);

        $data = Pengembalian::create($validate);
        return response()->json([
            'message' => 'Data berhasil di tambahkan',
            'data' => $data
        ], 201);
    }
}
