<?php

namespace App\Http\Controllers;

use App\Procedure;
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
        $procedures = Procedure::get();

        if(Auth::user()->type == 'admin'){
            return view('procedures.home_admin', ['lista' => $procedures]);
        } elseif (Auth::user()->type == 'oper'){
            return view('procedures.home_oper', ['lista' => $procedures]);

        }elseif (Auth::user()->type == 'patient'){
            return view('home', ['lista' => $procedures]);

        }

    }
}
