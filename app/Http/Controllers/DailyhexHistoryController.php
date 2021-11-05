<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyHexHistory;

class DailyhexHistoryController extends Controller
{
    public function index(){
        $hexHistory = DailyHexHistory::with('hexagram')->orderBy('id','desc')->get();
        return view('dailyHex',compact('hexHistory'));
    }
}
