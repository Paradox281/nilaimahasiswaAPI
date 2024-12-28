<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\OrangTuaModel;
use App\Models\SantriModel;
use App\Models\User;
use Auth;
use Str;

class ApiController extends Controller {
	
	function login(Request $request) {
		$login = Auth::Attempt($request->all());
   		if ($login) {
   			$user = Auth::user();
   			$user->save();
   			$user->api_token = Str::random(100);
   			// $user->makeVisible('api_token');

   			return response()->json([
   			    'response_code' => 201,
   			    'message' => 'Login Successful',
   			    'conntent' => $user
   			]);
   		}else{
   		    return response()->json([
   		        'response_code' => 500,
   		        'message' => 'Maaf, Username atau Password salah!'
   		    ]);
   		}
	}

	function tampil_santri() {
	   	$santri = SantriModel::select('*')
		->join('orang_tua', 'orang_tua.id_orang_tua', '=', 'santri.id_orang_tua')
	   	->get();
	   	

		if ($santri) {
			return response()->json([
				'response_code' => 200,
				'message' => 'ok',
				'body' => $santri
			]);
		} else {
			return response()->json([
				'response_code' => 500,
				'message' => 'internal error',
			]);
		}
	}


	function hapus_santri(Request $request) {
	    	$santri = SantriModel::where('id_santri', $request->id_santri)
	              ->delete();

		if ($santri) {
			return response()->json([
				'response_code' => 200,
				'message' => 'Data Berhasil di hapus',
				/* 
				'id_santri' => $request->id_santri
				 */
			]);
		} else {
			return response()->json([
				'response_code' => 500,
				'message' => 'internal error',
				/* 
				'id_santri' => $request->id_santri
				 */
			]);
		}
	}

	public function simpan_santri(Request $request)
    {
        // menyimpan data file yang diupload ke variabel $file
        //$file = $request->file('file_upload');

        // isi dengan nama folder tempat kemana file diupload
        //$tujuan_upload = 'data_file';

        // simpan santri
        $santri = SantriModel::create([
            'id_orang_tua' => $request->id_orang_tua,
            'nis' => $request->nis,
            'nm_santri' => $request->nm_santri,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            //'fileURL' => request()->getHttpHost().'/images/'.$file->getClientOriginalName(),
        ]);

        // proses upload file
		//$file->move($tujuan_upload,$file->getClientOriginalName());
        
        if ($santri) { // jika simpan santri berhasil
            return response()->json([
                'response_code' => 200,
                'message' => 'Simpan Data Berhasil',
            ]);
        }else{ // jika simpan santri gagal
            return response()->json([
                'response_code' => 404,
                'message' => 'Simpan Data Gagal'
            ]);
        }
    }


    function ubah_santri(Request $request) {
		$santri = SantriModel::where('id_santri', $request->id_santri)
		          ->update([
		        'nm_santri' => $request->nm_santri,
		        'nis' => $request->nis,
				'tgl_lahir' => $request->tgl_lahir,
				'tmp_lahir' => $request->tmp_lahir,
		        'alamat' => $request->alamat,
		        'no_hp' => $request->no_hp,
		      ]);

		if ($santri) {
			return response()->json([
				'response_code' => 200,
				'message' => 'ok',
				
			]);
		} else {
			return response()->json([
				'response_code' => 500,
				'message' => 'internal error',
				
			]);
		}
	}

		

	function tampil_ortu() {
		$ortu = OrangTuaModel::select('*')->get();
		if ($ortu) {
			return response()->json([
				'response_code' => 200,
				'message' => 'ok',
				'body' => $ortu
			]);
		} else {
			return response()->json([
				'response_code' => 500,
				'message' => 'internal error',
			]);
		}
	}

	function simpan_ortu(Request $request) {

			$user = User::create([
				'username' => $request->username,
            	'password' => Hash::make($request->password),
            	'role' => $request->role,
			]);
			$id = $user->id_user; 

        	$ortu = OrangTuaModel::create([
        		'id_user' => $id,
        		'nama_ortu' => $request->nama_ortu,
        		'alamat_ortu' => $request->alamat_ortu,
        		'no_hp_ortu' => $request->no_hp_ortu,
        	]);

		if ($ortu) {
			return response()->json([
				'response_code' => 201,
				'message' => 'ok',
				/* 
				'nama_ortu' => $request->nama_ortu,
        			'alamat_ortu' => $request->alamat_ortu,
        			'no_hp_ortu' => $request->no_hp_ortu,
				 */
			]);
		} else {
			return response()->json([
				'response_code' => 500,
				'message' => 'internal error',
				/* 
				'nama_ortu' => $request->nama_ortu,
        			'alamat_ortu' => $request->alamat_ortu,
        			'no_hp_ortu' => $request->no_hp_ortu,
				 */
			]);
		}
	}	



	function hapus_ortu(Request $request) {
	    	$ortu = OrangTuaModel::where('id_ortu', $request->id_ortu)
	              ->delete();

	        $user = User::where('id_user', $request->id_user)
	              ->delete();


		if ($ortu) {
			return response()->json([
				'response_code' => 201,
				'message' => 'ok',
				/* 
				'id_ortu' => $request->id_ortu
				 */
			]);
		} else {
			return response()->json([
				'response_code' => 500,
				'message' => 'internal error',
				/* 
				'id_ortu' => $request->id_ortu
				 */
			]);
		}
	}
	function ubah_ortu(Request $request) {
		$ortu = OrangTuaModel::where('id_ortu', $request->id_ortu)
		          ->update([
        	     	    	 'id_user' => 0,
		                 'nama_ortu' => $request->nama_ortu,
		                 'alamat_ortu' => $request->alamat_ortu,
		                 'no_hp_ortu' => $request->no_hp_ortu,
		          ]);

		if ($ortu) {
			return response()->json([
				'response_code' => 201,
				'message' => 'ok',
				/*
				'id_ortu' => $request->id_ortu,
		                'nama_ortu' => $request->nama_ortu,
		                'alamat_ortu' => $request->alamat_ortu,
		                'no_hp_ortu' => $request->no_hp_ortu,
				 */
			]);
		} else {
			return response()->json([
				'response_code' => 500,
				'message' => 'internal error',
				/*
				'id_ortu' => $request->id_ortu,
		                'nama_ortu' => $request->nama_ortu,
		                'alamat_ortu' => $request->alamat_ortu,
		                'no_hp_ortu' => $request->no_hp_ortu,
				 */
			]);
		}
	}

	function get_ortu_by_id(Request $request) {
		$ortu = OrangTuaModel::select('*')
			->where('id_ortu', '=', $request->id_ortu)
			->first();
		if ($ortu) {
			return response()->json([
				'response_code' => 201,
				'message' => 'ok',
				'body' => $ortu
			]);
		} else {
			return response()->json([
				'response_code' => 500,
				'message' => 'internal error',
				'body' => $ortu
			]);
		}
	}

}
