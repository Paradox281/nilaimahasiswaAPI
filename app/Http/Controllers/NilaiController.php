<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasPengajarModel;
use App\Models\PengajarModel;
use App\Models\KelasSantriModel;
use App\Models\SettingModel;
use App\Models\KelasModel;
use App\Models\PelajaranModel;
use App\Models\NilaiModel;
use Auth;

class NilaiController extends Controller
{
    public function tampilnilai()
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
                    ->join('pelajaran', 'kelas_pengajar.id_pelajaran', '=', 'pelajaran.id_pelajaran')
                    ->where('kelas_pengajar.id_pengajar', $pengajar->id_pengajar)
                    ->where('kelas_pengajar.id_tahun_ajaran', $setting->id_tahun_ajaran)
                    ->get();

        return view('tampilnilai', ['kelaspengajar' => $kelaspengajar]);
    }

    public function lihatnilai($id_kelas, $id_pelajaran)
    {
        // mendapatkan id_setting dan id_tahun_ajaran yang aktif untuk filter santri dan nilai pada function dibawah
        $setting = SettingModel::select('*')
                    ->join('semester', 'setting.id_semester', '=', 'semester.id_semester')
                    ->join('tahun_ajaran', 'setting.id_tahun_ajaran', '=', 'tahun_ajaran.id_tahun_ajaran')
                    ->where('setting.status', 1)
                    ->first();

        // menampilkan nama kelas pada judul
        $kelas = KelasModel::select('id_kelas', 'nm_kelas')
                ->where('id_kelas', $id_kelas)
                ->first();

        // menampilkan nama mata pelajaran pada judul
        $pelajaran = PelajaranModel::select('id_pelajaran', 'nm_pelajaran')
                    ->where('id_pelajaran', $id_pelajaran)
                    ->first();

        // menampilkan nama santri sesuai kelas dan tahun ajaran
        $santri = KelasSantriModel::select('*')
                ->join('santri', 'kelas_santri.id_santri', '=', 'santri.id_santri')
                ->where('id_kelas', $id_kelas)
                ->where('id_tahun_ajaran', $setting->id_tahun_ajaran)
                ->with('nilai')
                ->get();

        // return $santri;

        $nilaisantri = $santri->map(function ($val) use ($id_kelas, $id_pelajaran, $setting)
        // $val = data yang ada di $santri simpan kedalam $val
        // use ($id_kelas, $id_pelajaran, $setting) = untuk mengambil nilai di dalam kurung pada function (url di browser) dan mengambil nilai varibel yg kita buat di atas agar bisa digunakan 
        {
            // membuat format baru (atau key baru yang kita mau)
            return array(
                'id_santri' => $val['id_santri'],
                'nm_santri' => $val['nm_santri'],
                'nilai' => $val['nilai']->where('id_kelas', $id_kelas)
                                        ->where('id_pelajaran', $id_pelajaran)
                                        ->where('id_setting', $setting->id_setting)
                                        ->first()
                // data didalam array ini bisa dilakukan where
                // first di ujung jika data yang di ambil 1 (satu)
                // jika data nya bnyak ubah first menjadi values
            );
        });

        // return $nilaisantri;

        return view('lihatnilai', ['kelas' => $kelas, 'pelajaran' => $pelajaran, 'nilaisantri' => $nilaisantri, 'setting' => $setting]);
    }

    public function simpannilai(Request $request)
    {
        $nilai = NilaiModel::create([
            'id_santri' => $request->id_santri,
            'id_kelas' => $request->id_kelas,
            'id_pelajaran' => $request->id_pelajaran,
            'nilai' => $request->nilai,
            'id_setting' => $request->id_setting,
        ]);

        return redirect('nilai/lihat/'.$request->id_kelas.'/'.$request->id_pelajaran);
    }
    
    public function updatenilai(Request $request)
    {
        $nilai = NilaiModel::where('id_nilai', $request->id_nilai)
        ->update([
            'nilai' => $request->nilai,
        ]);
        
        return redirect('nilai/lihat/'.$request->id_kelas.'/'.$request->id_pelajaran);
    }
}
