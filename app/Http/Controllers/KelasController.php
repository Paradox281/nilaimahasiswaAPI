<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasModel;
use Auth;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next)
        {
            if (Auth::user()->role!="Administrator") {
                return redirect()->route('home');
            }
            return $next($request);
        });
    }

    public function tampilkelas()
    {
        $kelas = KelasModel::select('*')
                ->get();
                
        return view('tampilkelas', ['kelas' => $kelas]);
    }

    public function tambahkelas()
    {
        return view('tambahkelas');
    }

    public function simpankelas(Request $request)
    {
        $kelas = KelasModel::create([
            'kd_kelas' => $request->kd_kelas,
            'nm_kelas' => $request->nm_kelas,
        ]);

        return redirect()->route('tampilkelas');
    }

    public function ubahkelas($id_kelas)
    {
        $kelas = KelasModel::select('*')
                ->where('id_kelas', $id_kelas)
                ->get();

        return view('ubahkelas', ['kelas' => $kelas]);
    }

    public function updatekelas(Request $request)
    {
        $kelas = KelasModel::where('id_kelas', $request->id_kelas)
                  ->update([
                    'kd_kelas' => $request->kd_kelas,
                    'nm_kelas' => $request->nm_kelas,
                  ]);

        return redirect()->route('tampilkelas');
    }

    public function hapuskelas($id_kelas)
    {
        $kelas = KelasModel::where('id_kelas', $id_kelas)
                  ->delete();

        return redirect()->route('tampilkelas');
    }
}
