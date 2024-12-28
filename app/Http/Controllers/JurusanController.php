<?php

namespace App\Http\Controllers;
use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data = jurusan::orderBy('kode', 'asc')->get();
        
        return response()->json([
            'status' => true,
            'message' => 'Data Ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'kaprodi' => 'required|string|max:255',
        ]);

        $data = new jurusan();
        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->kaprodi = $request->kaprodi;
        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses Memasukkan Data'
        ], 201); // 201 Created
    }

    public function show($id)
    {
        $data = jurusan::find($id);
        
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ], 404); // 404 Not Found
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Ditemukan',
            'data' => $data
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'kaprodi' => 'required|string|max:255',
        ]);

        $data = jurusan::find($id);
        
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404); // 404 Not Found
        }

        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->kaprodi = $request->kaprodi;
        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses Update Data'
        ], 200);
    }

    public function destroy($id)
    {
        $data = jurusan::find($id);
        
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404); // 404 Not Found
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses Delete Data'
        ], 200);
    }
}
