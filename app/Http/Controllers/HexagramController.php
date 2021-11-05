<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hexagram;

class HexagramController extends Controller
{
    public function hexagram(){
        $hexagram = Hexagram::all();
        return view('hex/index',compact('hexagram'));
    }

    public function hexagramInfo($id){
        $hex = Hexagram::find($id);
        return view('hex/hexagramInfo',compact('hex'));
    }

    public function hexagramYao($id,$yao){
        $hex = Hexagram::find($id);
        return view('hex/hexagramYao',compact('hex'));
    }
}
