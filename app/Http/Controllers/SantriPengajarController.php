<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasModel;
use App\Models\PengajarModel;
use App\Models\KelasPengajarModel;
use App\Models\KelasSantriModel;
use App\Models\SettingModel;
use Auth;

class SantriPengajarController extends Controller
{
    public function tampilsantripengajar()
    {
        $id = Auth::user()->id_user;

        $pengajar = PengajarModel::select('id_pengajar')
                        ->where('id_user', $id)
                        ->first();

        $setting = SettingModel::select('id_tahun_ajaran')
                    ->where('status', 1)
                    ->first();

        $kelaspengajar = KelasPengajarModel::select('*')
                    ->join('kelas', 'kelas_pengajar.id_kelas', '=', 'kelas.id_kelas')
                    ->where('kelas_pengajar.id_pengajar', $pengajar->id_pengajar)
                    ->where('kelas_pengajar.id_tahun_ajaran', $setting->id_tahun_ajaran)
                    ->groupBy('kelas_pengajar.id_kelas')
                    ->get();

        return view('tampilsantripengajar', ['kelaspengajar' => $kelaspengajar]);
    }
    
    public function lihatsantripengajar($id_kelas)
    {
        $setting = SettingModel::select('*')
        ->join('semester', 'setting.id_semester', '=', 'semester.id_semester')
        ->join('tahun_ajaran', 'setting.id_tahun_ajaran', '=', 'tahun_ajaran.id_tahun_ajaran')
        ->where('setting.status', 1)
        ->first();
        
        // menampilkan nama kelas pada judul
        $kelas = KelasModel::select('id_kelas', 'nm_kelas')
                ->where('id_kelas', $id_kelas)
                ->first();

        // menampilkan nama santri sesuai kelas dan tahun ajaran
        $santri = KelasSantriModel::select('*')
        ->join('santri', 'kelas_santri.id_santri', '=', 'santri.id_santri')
        ->where('id_kelas', $id_kelas)
        ->where('id_tahun_ajaran', $setting->id_tahun_ajaran)
        ->get();
        
        // return $santri;

        return view('lihatsantripengajar', ['kelas' => $kelas, 'santri' => $santri, 'setting' => $setting]);
    }
}
