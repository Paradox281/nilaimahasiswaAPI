<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\OrangTuaModel;
use App\Models\User;
use Auth;
use PDF;

class OrangTuaController extends Controller
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
    
    public function tampilorangtua()
    {
        $orang_tua = OrangTuaModel::select('*')
                     ->join('users', 'orang_tua.id_user', '=', 'users.id_user')
                     ->get();
        return view('tampilorangtua', ['orang_tua' => $orang_tua]);
    }

    public function tambahorangtua()
    {
        return view('tambahorangtua');
    }

    public function simpanorangtua(Request $request)
    {
        // register akun orang tua
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $id = $user->id_user; // ini untuk mengambil id user yg sudah disimpan utnuk di pakai di tabel orang tua

        // simpan data orang tua
        $orangtua = OrangTuaModel::create([
            'id_user' => $id,
            'nm_orang_tua' => $request->nm_orang_tua,
            'alamat_orang_tua' => $request->alamat_orang_tua,
            'no_hp_orang_tua' => $request->no_hp_orang_tua,
        ]);

        return redirect()->route('tampilorangtua');
    }

    public function ubahorangtua($id_orang_tua)
    {
        $orang_tua = OrangTuaModel::select('*')
                     ->join('users', 'orang_tua.id_user', '=', 'users.id_user')
                     ->where('id_orang_tua', $id_orang_tua)
                     ->get();

        return view('ubahorangtua', ['orang_tua' => $orang_tua]);
    }

    public function updateorangtua(Request $request)
    {
        $orangtua = OrangTuaModel::where('id_orang_tua', $request->id_orang_tua)
                  ->update([
                    'nm_orang_tua' => $request->nm_orang_tua,
                    'alamat_orang_tua' => $request->alamat_orang_tua,
                    'no_hp_orang_tua' => $request->no_hp_orang_tua,
                  ]);

        if ($request->password!="") {
            // jika password diubah
            $user = User::where('id_user', $request->id_user)
                  ->update([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                  ]);
        }else{
            // jika password kosong atau tidak diubah
            $user = User::where('id_user', $request->id_user)
                  ->update([
                    'username' => $request->username,
                  ]);
        }

        return redirect()->route('tampilorangtua');
    }

    public function hapusorangtua($id_orang_tua, $id_user)
    {
        $orangtua = OrangTuaModel::where('id_orang_tua', $id_orang_tua)
                  ->delete();

        $user = User::where('id_user', $id_user)
                  ->delete();

        return redirect()->route('tampilorangtua');
    }

    public function cetakorangtua()
    {
        $orangtua = OrangTuaModel::select('*')
                    ->join('users', 'orang_tua.id_user', '=', 'users.id_user')
                    ->get();

        $pdf = PDF::loadView('cetakorangtua', ['orangtua' => $orangtua]);
        return $pdf->stream('Laporan-Data-Orang-Tua.pdf');
    }
}
