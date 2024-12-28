<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemesterModel;
use Auth;

class SemesterController extends Controller
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
    
    public function tampilsemester()
    {
        $semester = SemesterModel::select('*')
                ->get();
                
        return view('tampilsemester', ['semester' => $semester]);
    }
}
