<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::orderBy('nama', 'asc')->get();
        
        return response()->json([
            'status' => true,
            'message' => 'Data Ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jeniskelamin' => 'required|string|max:50',
            'nohp' => 'required|string|max:50',
            'jurusan' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'foto' => 'nullable|string|max:255',
        ]);

        $data = new Siswa();
        $data->nim = $request->nim;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->nohp = $request->nohp;
        $data->jurusan = $request->jurusan;
        $data->tanggallahir = $request->tanggallahir;
        $data->foto = $request->foto;
        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses Memasukkan Data'
        ], 201); // 201 Created
    }

    public function show($id)
    {
        $data = Siswa::find($id);
        
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
            'nim' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jeniskelamin' => 'required|string|max:50',
            'nohp' => 'required|string|max:50',
            'jurusan' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'foto' => 'nullable|string|max:255',
        ]);

        $data = Siswa::find($id);
        
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404); // 404 Not Found
        }

        $data->nim = $request->nim;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->nohp = $request->nohp;
        $data->jurusan = $request->jurusan;
        $data->tanggallahir = $request->tanggallahir;
        $data->foto = $request->foto;
        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses Update Data'
        ], 200);
    }

    public function destroy($id)
    {
        $data = Siswa::find($id);
        
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
