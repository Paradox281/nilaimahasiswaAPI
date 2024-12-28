<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('/login', [ApiController::class, 'login']);

Route::post('/jurusan', [JurusanController::class, 'store']);
Route::get('/jurusan', [JurusanController::class, 'index']);
Route::put('/jurusan/{id}', [JurusanController::class, 'update']);
Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy']);

Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa', [SiswaController::class, 'index']);
Route::put('/siswa/{id}', [SiswaController::class, 'update']);
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);

Route::post('/matakuliah', [MatakuliahController::class, 'store']);
Route::get('/matakuliah', [MatakuliahController::class, 'index']);
Route::put('/matakuliah/{id}', [MatakuliahController::class, 'update']);
Route::delete('/matakuliah/{id}', [MatakuliahController::class, 'destroy']);