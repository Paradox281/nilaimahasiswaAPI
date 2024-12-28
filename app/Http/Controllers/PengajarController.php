<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PengajarModel;
use App\Models\User;
use Auth;
use PDF;

class PengajarController extends Controller
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
    
    public function tampilpengajar()
    {
        $pengajar = PengajarModel::select('*')
                     ->join('users', 'pengajar.id_user', '=', 'users.id_user')
                     ->get();
        return view('tampilpengajar', ['pengajar' => $pengajar]);
    }

    public function tambahpengajar()
    {
        return view('tambahpengajar');
    }

    public function simpanpengajar(Request $request)
    {
        // register akun pengajar
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $id = $user->id_user; // ini untuk mengambil id user yg sudah disimpan utnuk di pakai di tabel pengajar

        // simpan data pengjar
        $pengajar = PengajarModel::create([
            'id_user' => $id,
            'nip' => $request->nip,
            'nm_pengajar' => $request->nm_pengajar,
            'pendidikan' => $request->pendidikan,
            'alamat_pengajar' => $request->alamat_pengajar,
            'no_hp_pengajar' => $request->no_hp_pengajar,
        ]);

        return redirect()->route('tampilpengajar');
    }

    public function ubahpengajar($id_pengajar)
    {
        $pengajar = PengajarModel::select('*')
                     ->join('users', 'pengajar.id_user', '=', 'users.id_user')
                     ->where('id_pengajar', $id_pengajar)
                     ->get();

        return view('ubahpengajar', ['pengajar' => $pengajar]);
    }

    public function updatepengajar(Request $request)
    {
        $pengajar = PengajarModel::where('id_pengajar', $request->id_pengajar)
                  ->update([
                    'nip' => $request->nip,
                    'nm_pengajar' => $request->nm_pengajar,
                    'pendidikan' => $request->pendidikan,
                    'alamat_pengajar' => $request->alamat_pengajar,
                    'no_hp_pengajar' => $request->no_hp_pengajar,
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

        return redirect()->route('tampilpengajar');
    }

    public function hapuspengajar($id_pengajar, $id_user)
    {
        $pengajar = PengajarModel::where('id_pengajar', $id_pengajar)
                  ->delete();

        $user = User::where('id_user', $id_user)
                  ->delete();

        return redirect()->route('tampilpengajar');
    }

    public function cetakpengajar()
    {
        $pengajar = PengajarModel::select('*')
                    ->join('users', 'pengajar.id_user', '=', 'users.id_user')
                    ->get();

        $pdf = PDF::loadView('cetakpengajar', ['pengajar' => $pengajar]);
        return $pdf->stream('Laporan-Data-Pengjar.pdf');
    }
}
