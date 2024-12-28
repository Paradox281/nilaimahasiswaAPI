<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SettingModel;
use App\Models\TahunAjaranModel;
use App\Models\SemesterModel;
use Auth;

class SettingController extends Controller
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

    public function tampilsetting()
    {
        $setting = SettingModel::select('*')
                ->join('semester', 'setting.id_semester', '=', 'semester.id_semester')
                ->join('tahun_ajaran', 'setting.id_tahun_ajaran', '=', 'tahun_ajaran.id_tahun_ajaran')
                ->get();

        $informasi = SettingModel::select('semester.nm_semester', 'tahun_ajaran.nm_tahun_ajaran')
                ->join('semester', 'setting.id_semester', '=', 'semester.id_semester')
                ->join('tahun_ajaran', 'setting.id_tahun_ajaran', '=', 'tahun_ajaran.id_tahun_ajaran')
                ->where('setting.status', 1)
                ->first();

        $tahunajaran = TahunAjaranModel::select('*')
                        ->get();

        $semester = SemesterModel::select('*')
                        ->get();
                
        return view('tampilsetting', ['setting' => $setting, 'informasi' => $informasi, 'tahunajaran' => $tahunajaran, 'semester' => $semester]);
    }

    public function simpansetting(Request $request)
    {
        // mengubah status menjadi 0 jika status yg dipil adalah 1 (aktif)
        if ($request->status==1) {
            $updateStatus = SettingModel::where('status', 1)
                  ->update([
                    'status' => 0,
                  ]);
        }

        $setting = SettingModel::create([
            'id_semester' => $request->id_semester,
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
            'status' => $request->status
        ]);

        return redirect()->route('tampilsetting');
    }
}
