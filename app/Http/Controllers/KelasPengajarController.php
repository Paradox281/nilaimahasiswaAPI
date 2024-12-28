<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasModel;
use App\Models\KelasPengajarModel;
use App\Models\SettingModel;
use Auth;

class KelasPengajarController extends Controller
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
    
    public function tampilkelaspengajar()
    {
        $kelas = KelasModel::select('*')
                ->get();
                
        return view('tampilkelaspengajar', ['kelas' => $kelas]);
    }

    public function listkelaspengajar($id_kelas)
    {
        $kelas = KelasModel::select('id_kelas', 'nm_kelas')
                 ->where('id_kelas', $id_kelas)
                 ->first();

        $set = SettingModel::select('id_semester', 'id_tahun_ajaran')
                ->where('status', 1)
                ->first();

        $nmpengajar = KelasPengajarModel::select('*')
                    ->join('pelajaran', 'kelas_pengajar.id_pelajaran', '=', 'pelajaran.id_pelajaran')
                    ->join('pengajar', 'kelas_pengajar.id_pengajar', '=', 'pengajar.id_pengajar')
                    ->where('kelas_pengajar.id_kelas', $id_kelas)
                    ->where('kelas_pengajar.id_tahun_ajaran',$set->id_tahun_ajaran)
                    ->get();

        return view('listkelaspengajar', ['kelas' => $kelas, 'nmpengajar' => $nmpengajar]);
    }

    public function simpankelaspengajar(Request $request)
    {

    }

    public function hapuskelaspengajar($id_kelas_pengajar)
    {

    }
}
