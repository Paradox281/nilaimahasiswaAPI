<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasModel;
use App\Models\KelasSantriModel;
use App\Models\SettingModel;
use Auth;

class KelasSantriController extends Controller
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
    
    public function tampilkelassantri()
    {
        $kelas = KelasModel::select('*')
                ->get();
                
        return view('tampilkelassantri', ['kelas' => $kelas]);
    }

    public function listkelassantri($id_kelas)
    {
        // mendapatkan nama kelas
        $nmkelas = KelasModel::select('nm_kelas')
                 ->where('id_kelas', $id_kelas)
                 ->first();

        // get id_tahun_ajaran yang aktif pada tabel setting
        $info = SettingModel::select('id_semester', 'id_tahun_ajaran')
                ->where('status', 1)
                ->first();

        // get data kelas santri berdasarkan tahun ajaran yang aktif pada sistem
        $nmsantri = KelasSantriModel::select('*')
                    ->join('santri', 'kelas_santri.id_santri', '=', 'santri.id_santri')
                    ->where('id_kelas', $id_kelas)
                    ->where('id_tahun_ajaran',$info->id_tahun_ajaran)
                    ->get();

        return view('listkelassantri', ['nmkelas' => $nmkelas, 'nmsantri' => $nmsantri]);
    }

    public function simpankelassantri(Request $request)
    {

    }

    public function hapuskelassantri($id_kelas, $id_kelas_santri)
    {

    }
}
