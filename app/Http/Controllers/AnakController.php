<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrangTuaModel;
use App\Models\SantriModel;
use App\Models\SettingModel;
use App\Models\NilaiModel;
use Auth;

class AnakController extends Controller
{
    public function tampilanak()
    {
        // get id_user
        $id = Auth::user()->id_user;

        // get id_orang_tua
        $orangtua = OrangTuaModel::select('id_orang_tua')
                        ->where('id_user', $id)
                        ->first();

        // return $orangtua->id_orang_tua;

        // get anak by orang tua yg login
        $anak = SantriModel::select('*')
                ->where('id_orang_tua', $orangtua->id_orang_tua)
                ->get();

        // return $anak;

        return view('tampilanak', ['anak' => $anak]);
    }
    
    public function nilaianak($id_santri)
    {
        $anak = SantriModel::select('nm_santri')
                ->where('id_santri', $id_santri)
                ->first();

        $setting = SettingModel::select('id_setting')
                    ->where('status', 1)
                    ->first();

        $nilai = NilaiModel::select('*')
                ->join('pelajaran', 'nilai.id_pelajaran', '=', 'pelajaran.id_pelajaran')
                ->where('id_santri', $id_santri)
                ->where('id_setting', $setting->id_setting)
                ->get();

        // return $nilai;

        $jumlahnilai = NilaiModel::select('*')
                ->join('pelajaran', 'nilai.id_pelajaran', '=', 'pelajaran.id_pelajaran')
                ->where('id_santri', $id_santri)
                ->where('id_setting', $setting->id_setting)
                ->sum('nilai');

        // return $jumlahnilai;

        $ratanilai = NilaiModel::select('*')
                ->join('pelajaran', 'nilai.id_pelajaran', '=', 'pelajaran.id_pelajaran')
                ->where('id_santri', $id_santri)
                ->where('id_setting', $setting->id_setting)
                ->avg('nilai');

        // return $ratanilai;
        
        $nilaianak = array( // membuat format data array baru
            'datanilai' => $nilai,
            'jumlahnilai' => $jumlahnilai,
            'ratanilai' => $ratanilai
        );

        // return $nilaianak;

        return view('nilaianak', ['anak' => $anak, 'nilaianak' => $nilaianak]);
    }
}
