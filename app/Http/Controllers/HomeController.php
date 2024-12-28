<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SettingModel;

class HomeController extends Controller
{
    public function index()
    {
        $informasi = SettingModel::select('semester.nm_semester', 'tahun_ajaran.nm_tahun_ajaran')
                ->join('semester', 'setting.id_semester', '=', 'semester.id_semester')
                ->join('tahun_ajaran', 'setting.id_tahun_ajaran', '=', 'tahun_ajaran.id_tahun_ajaran')
                ->where('setting.status', 1)
                ->first();

        return view('home', ['informasi' => $informasi]);
    }
}
