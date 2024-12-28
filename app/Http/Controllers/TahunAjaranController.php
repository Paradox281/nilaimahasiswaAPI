<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaranModel;
use Auth;

class TahunAjaranController extends Controller
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
    
    public function tampiltahunajaran()
    {
        $tahunajaran = TahunAjaranModel::select('*')
                ->get();
                
        return view('tampiltahunajaran', ['tahunajaran' => $tahunajaran]);
    }

    public function tambahtahunajaran()
    {
        return view('tambahtahunajaran');
    }
    public function simpantahunajaran(Request $request)
    {
        $tahunajaran = TahunAjaranModel::create([
            'nm_tahun_ajaran' => $request->nm_tahun_ajaran,
        ]);

        return redirect()->route('tampiltahunajaran');
    }

    public function ubahtahunajaran($id_tahun_ajaran)
    {
        $tahunajaran = TahunAjaranModel::select('*')
                ->where('id_tahun_ajaran', $id_tahun_ajaran)
                ->get();

        return view('ubahtahunajaran', ['tahunajaran' => $tahunajaran]);
    }

    public function updatetahunajaran(Request $request)
    {
        $tahunajaran = TahunAjaranModel::where('id_tahun_ajaran', $request->id_tahun_ajaran)
                  ->update([
                    'nm_tahun_ajaran' => $request->nm_tahun_ajaran,
                  ]);

        return redirect()->route('tampiltahunajaran');
    }
}
