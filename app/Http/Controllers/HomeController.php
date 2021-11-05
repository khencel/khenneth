<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Auth::user()->email_verified_at != null){
            if(Gate::denies('manage-users')){
                return view('home');
            }   
            return view('homeAdmin');
        }
        auth()->logout();
        return view('notVerify');
        
    }
}
