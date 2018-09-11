<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() && Auth::user()->role_id == 1){
            return view('admin.dashboard');
        }else if(Auth::user() && Auth::user()->role_id == 2){
            return view('teacher.dashboard');
        }else if(Auth::user() && Auth::user()->role_id == 3){
            return view('student.dashboard');
        }else{
            return view('logout');
        }
    }
}
