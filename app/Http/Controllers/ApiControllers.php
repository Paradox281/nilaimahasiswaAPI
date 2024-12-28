<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Str;

class ApiControllers extends Controller {

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

}