<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelajaranModel;
use Auth;

class PelajaranController extends Controller
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
    
    public function tampilpelajaran()
    {
        $pelajaran = PelajaranModel::select('*')
                ->get();
                
        return view('tampilpelajaran', ['pelajaran' => $pelajaran]);
    }

    public function tambahpelajaran()
    {
        return view('tambahpelajaran');
    }

    public function simpanpelajaran(Request $request)
    {
        $pelajaran = PelajaranModel::create([
            'kd_pelajaran' => $request->kd_pelajaran,
            'nm_pelajaran' => $request->nm_pelajaran,
        ]);

        return redirect()->route('tampilpelajaran');
    }

    public function ubahpelajaran($id_pelajaran)
    {
        $pelajaran = PelajaranModel::select('*')
                ->where('id_pelajaran', $id_pelajaran)
                ->get();

        return view('ubahpelajaran', ['pelajaran' => $pelajaran]);
    }

    public function updatepelajaran(Request $request)
    {
        $pelajaran = PelajaranModel::where('id_pelajaran', $request->id_pelajaran)
                  ->update([
                    'kd_pelajaran' => $request->kd_pelajaran,
                    'nm_pelajaran' => $request->nm_pelajaran,
                  ]);

        return redirect()->route('tampilpelajaran');
    }

    public function hapuspelajaran($id_pelajaran)
    {
        $pelajaran = PelajaranModel::where('id_pelajaran', $id_pelajaran)
                  ->delete();

        return redirect()->route('tampilpelajaran');
    }
}
