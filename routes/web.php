<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelasSantriController;
use App\Http\Controllers\KelasPengajarController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SantriPengajarController;
use App\Http\Controllers\AnakController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// LOGIN
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

// HOME
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// ORANG TUA
Route::get('orangtua/tampil', [OrangTuaController::class, 'tampilorangtua'])->name('tampilorangtua')->middleware('auth');
Route::get('orangtua/tambah', [OrangTuaController::class, 'tambahorangtua'])->name('tambahorangtua')->middleware('auth');
Route::post('orangtua/simpan', [OrangTuaController::class, 'simpanorangtua'])->name('simpanorangtua')->middleware('auth');
Route::get('orangtua/ubah/{id_orang_tua}', [OrangTuaController::class, 'ubahorangtua'])->name('ubahorangtua')->middleware('auth');
Route::get('orangtua/hapus/{id_orang_tua}/{id_user}', [OrangTuaController::class, 'hapusorangtua'])->name('hapusorangtua')->middleware('auth');
Route::post('orangtua/update', [OrangTuaController::class, 'updateorangtua'])->name('updateorangtua')->middleware('auth');
Route::get('orangtua/cetak', [OrangTuaController::class, 'cetakorangtua'])->name('cetakorangtua')->middleware('auth');

// SANTRI
Route::get('santri/tampil', [SantriController::class, 'tampilsantri'])->name('tampilsantri')->middleware('auth');
Route::get('santri/tambah', [SantriController::class, 'tambahsantri'])->name('tambahsantri')->middleware('auth');
Route::post('santri/simpan', [SantriController::class, 'simpansantri'])->name('simpansantri')->middleware('auth');
Route::get('santri/ubah/{id_santri}', [SantriController::class, 'ubahsantri'])->name('ubahsantri')->middleware('auth');
Route::post('santri/update', [SantriController::class, 'updatesantri'])->name('updatesantri')->middleware('auth');
Route::get('santri/hapus/{id_santri}', [SantriController::class, 'hapussantri'])->name('hapussantri')->middleware('auth');
Route::get('santri/cetak', [SantriController::class, 'cetaksantri'])->name('cetaksantri')->middleware('auth');

// PENGAJAR
Route::get('pengajar/tampil', [PengajarController::class, 'tampilpengajar'])->name('tampilpengajar')->middleware('auth');
Route::get('pengajar/tambah', [PengajarController::class, 'tambahpengajar'])->name('tambahpengajar')->middleware('auth');
Route::post('pengajar/simpan', [PengajarController::class, 'simpanpengajar'])->name('simpanpengajar')->middleware('auth');
Route::get('pengajar/ubah/{id_pengajar}', [PengajarController::class, 'ubahpengajar'])->name('ubahpengajar')->middleware('auth');
Route::get('pengajar/hapus/{id_pengajar}/{id_user}', [PengajarController::class, 'hapuspengajar'])->name('hapuspengajar')->middleware('auth');
Route::post('pengajar/update', [PengajarController::class, 'updatepengajar'])->name('updatepengajar')->middleware('auth');
Route::get('pengajar/cetak', [PengajarController::class, 'cetakpengajar'])->name('cetakpengajar')->middleware('auth');

// PELAJARAN
Route::get('pelajaran/tampil', [PelajaranController::class, 'tampilpelajaran'])->name('tampilpelajaran')->middleware('auth');
Route::get('pelajaran/tambah', [PelajaranController::class, 'tambahpelajaran'])->name('tambahpelajaran')->middleware('auth');
Route::post('pelajaran/simpan', [PelajaranController::class, 'simpanpelajaran'])->name('simpanpelajaran')->middleware('auth');
Route::get('pelajaran/ubah/{id_pelajaran}', [PelajaranController::class, 'ubahpelajaran'])->name('ubahpelajaran')->middleware('auth');
Route::post('pelajaran/update', [PelajaranController::class, 'updatepelajaran'])->name('updatepelajaran')->middleware('auth');
Route::get('pelajaran/hapus/{id_pelajaran}', [PelajaranController::class, 'hapuspelajaran'])->name('hapuspelajaran')->middleware('auth');

// KELAS
Route::get('kelas/tampil', [KelasController::class, 'tampilkelas'])->name('tampilkelas')->middleware('auth');
Route::get('kelas/tambah', [KelasController::class, 'tambahkelas'])->name('tambahkelas')->middleware('auth');
Route::post('kelas/simpan', [KelasController::class, 'simpankelas'])->name('simpankelas')->middleware('auth');
Route::get('kelas/ubah/{id_tahun_ajaran}', [KelasController::class, 'ubahkelas'])->name('ubahkelas')->middleware('auth');
Route::post('kelas/update', [KelasController::class, 'updatekelas'])->name('updatekelas')->middleware('auth');
Route::get('kelas/hapus/{id_tahun_ajaran}', [KelasController::class, 'hapuskelas'])->name('hapuskelas')->middleware('auth');

// KELAS SANTRI
Route::get('kelassantri/tampil', [KelasSantriController::class, 'tampilkelassantri'])->name('tampilkelassantri')->middleware('auth');
Route::get('kelassantri/list/{id_kelas}', [KelasSantriController::class, 'listkelassantri'])->name('listkelassantri')->middleware('auth');
Route::post('kelassantri/simpan', [KelasSantriController::class, 'simpankelassantri'])->name('simpankelassantri')->middleware('auth');
Route::get('kelassantri/hapus/{id_kelas}/{id_kelas_santri}', [KelasSantriController::class, 'hapuskelassantri'])->name('hapuskelassantri')->middleware('auth');

// KELAS PENGAJAR
Route::get('kelaspengajar/tampil', [KelasPengajarController::class, 'tampilkelaspengajar'])->name('tampilkelaspengajar')->middleware('auth');
Route::get('kelaspengajar/list/{id_kelas}', [KelasPengajarController::class, 'listkelaspengajar'])->name('listkelaspengajar')->middleware('auth');
Route::post('kelaspengajar/simpan', [KelasPengajarController::class, 'simpankelaspengajar'])->name('simpankelaspengajar')->middleware('auth');
Route::get('kelaspengajar/hapus/{id_kelas_pengajar}', [KelasPengajarController::class, 'hapuskelaspengajar'])->name('hapuskelaspengajar')->middleware('auth');

// SEMESTER
Route::get('semester/tampil', [SemesterController::class, 'tampilsemester'])->name('tampilsemester')->middleware('auth');

// TAHUN AJARAN
Route::get('tahunajaran/tampil', [TahunAjaranController::class, 'tampiltahunajaran'])->name('tampiltahunajaran')->middleware('auth');
Route::get('tahunajaran/tambah', [TahunAjaranController::class, 'tambahtahunajaran'])->name('tambahtahunajaran')->middleware('auth');
Route::post('tahunajaran/simpan', [TahunAjaranController::class, 'simpantahunajaran'])->name('simpantahunajaran')->middleware('auth');
Route::get('tahunajaran/ubah/{id_tahun_ajaran}', [TahunAjaranController::class, 'ubahtahunajaran'])->name('ubahtahunajaran')->middleware('auth');
Route::post('tahunajaran/update', [TahunAjaranController::class, 'updatetahunajaran'])->name('updatetahunajaran')->middleware('auth');

// SETTING
Route::get('setting/tampil', [SettingController::class, 'tampilsetting'])->name('tampilsetting')->middleware('auth');
Route::post('setting/simpan', [SettingController::class, 'simpansetting'])->name('simpansetting')->middleware('auth');

// SANTRI PENGAJAR
Route::get('santripengajar/tampil', [SantriPengajarController::class, 'tampilsantripengajar'])->name('tampilsantripengajar')->middleware('auth');
Route::get('santripengajar/lihat/{id_kelas}', [SantriPengajarController::class, 'lihatsantripengajar'])->name('lihatsantripengajar')->middleware('auth');

// NILAI
Route::get('nilai/tampil', [NilaiController::class, 'tampilnilai'])->name('tampilnilai')->middleware('auth');
Route::get('nilai/lihat/{id_kelas}/{id_pelajaran}', [NilaiController::class, 'lihatnilai'])->name('lihatnilai')->middleware('auth');
Route::post('nilai/simpan', [NilaiController::class, 'simpannilai'])->name('simpannilai')->middleware('auth');
Route::post('nilai/update', [NilaiController::class, 'updatenilai'])->name('updatenilai')->middleware('auth');

// ANAK ORANG TUA
Route::get('anak/tampil', [AnakController::class, 'tampilanak'])->name('tampilanak')->middleware('auth');
Route::get('anak/nilai/{id_santri}', [AnakController::class, 'nilaianak'])->name('nilaianak')->middleware('auth');
