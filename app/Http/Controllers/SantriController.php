<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SantriModel;
use App\Models\OrangTuaModel;
use Auth;
use PDF;

class SantriController extends Controller
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
    
    public function tampilsantri()
    {
        $santri = SantriModel::select('*')
                ->join('orang_tua', 'santri.id_orang_tua', '=', 'orang_tua.id_orang_tua')
                ->get();
                
        return view('tampilsantri', ['santri' => $santri]);
    }

    public function tambahsantri()
    {
        $orangtua = OrangTuaModel::select('*')
                    ->get();
        return view('tambahsantri', ['orangtua' => $orangtua]);
    }

    public function simpansantri(Request $request)
    {
        $santri = SantriModel::create([
            'id_orang_tua' => $request->id_orang_tua,
            'nis' => $request->nis,
            'nm_santri' => $request->nm_santri,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('tampilsantri');
    }

    public function ubahsantri($id_santri)
    {
        $santri = SantriModel::select('*')
                ->join('orang_tua', 'santri.id_orang_tua', '=', 'orang_tua.id_orang_tua')
                ->where('id_santri', $id_santri)
                ->get();

        $orangtua = OrangTuaModel::select('*')
                    ->get();

        return view('ubahsantri', ['santri' => $santri, 'orangtua' => $orangtua]);
    }

    public function updatesantri(Request $request)
    {
        $santri = SantriModel::where('id_santri', $request->id_santri)
                  ->update([
                    'id_orang_tua' => $request->id_orang_tua,
                    'nis' => $request->nis,
                    'nm_santri' => $request->nm_santri,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lahir' => $request->tgl_lahir,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                  ]);

        return redirect()->route('tampilsantri');
    }

    public function hapussantri($id_santri)
    {
        $santri = SantriModel::where('id_santri', $id_santri)
                  ->delete();

        return redirect()->route('tampilsantri');
    }

    public function cetaksantri()
    {
        $santri = SantriModel::select('*')
                ->join('orang_tua', 'santri.id_orang_tua', '=', 'orang_tua.id_orang_tua')
                ->get();

        $pdf = PDF::loadView('cetaksantri', ['santri' => $santri]);
        return $pdf->stream('Laporan-Data-Santri.pdf');
    }
}
