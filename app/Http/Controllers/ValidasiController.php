<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Validasi;
use Illuminate\Support\Facades\Validator;

class ValidasiController extends Controller
{
    // GET /api/pengembalian
    public function index(Request $request)
    {
        $query = Validasi::query();

        if ($request->has('tanggal') && $request->tanggal != '') {
            $query->where('tanggal', $request->tanggal);
        }

        if ($request->has('pic') && $request->pic != '') {
            $query->where('pictimbang', $request->pic);
        }

        $data = $query->orderByRaw("CASE WHEN status = 'saved' THEN 1 ELSE 2 END")->get();

        return response()->json($data);
    }

    // POST /api/pengembalian/update
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:validasi,id',
            'bin_location' => 'required|string',
            'cones' => 'nullable|integer',
            'waktu_kembali' => 'required|date',
            'pic' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = Validasi::find($request->id);
        $data->update([
            'bin_location' => $request->bin_location,
            'cones' => $request->cones,
            'waktu_kembali' => $request->waktu_kembali,
            'Pic' => $request->pic,
            'status' => 'saved'
        ]);

        return response()->json(['message' => 'Data updated successfully']);
    }

    // POST /api/pengembalian/updateCones
    public function updateCones(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:validasi,id',
            'cones' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = Validasi::find($request->id);
        $data->update(['cones' => $request->cones]);

        return response()->json(['message' => 'Cones updated']);
    }

    // POST /api/pengembalian/updateRemarks
    public function updateRemarks(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:validasi,id',
            'remarks' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = Validasi::find($request->id);
        $data->update(['remarks' => $request->remarks]);

        return response()->json(['message' => 'Remarks updated']);
    }

    // GET /api/pengembalian/export
    public function export()
    {
        // nanti kita isi pakai Laravel Excel
        return response()->json(['message' => 'Export feature coming soon']);
    }
     // POST /api/pengembalian
    public function store(Request $request)
    {
        // Gunakan json()->all() karena React mengirim JSON
        $data = $request->json()->all();

        if (!is_array($data) || count($data) === 0) {
            return response()->json(['message' => 'Data harus berupa array dan tidak kosong'], 400);
        }

        $saved = [];

        foreach ($data as $row) {
            $validator = Validator::make($row, [
                'itemCode' => 'required|string',
                'batchNumber' => 'required|string',
                'qty' => 'required|numeric|min:0',
                'binLocation' => 'nullable|string',
                'date' => 'required|date',
                'pic' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Simpan ke database, sesuaikan nama kolom DB
            $saved[] = Validasi::create([
                'item_code' => $row['itemCode'],
                'batch_number' => $row['batchNumber'],
                'qty' => $row['qty'],
                'bin_location' => $row['binLocation'] ?? '',
                'tanggal' => $row['date'],
                'pictimbang' => $row['pic'],
            ]);
        }

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'saved' => $saved,
        ]);
    }

}
