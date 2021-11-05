<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hexagram;
use App\Schedule;


class ConsultantController extends Controller
{
    public function consultants($id){
        $consultant = User::where('api_token',$id)->first();
        return view('consultant',compact('consultant'));
    }

    public function hex($id){
        $hex = Hexagram::find($id);
        return view('hex/hexInfo',compact('hex'));
    }

    public function consultUser($id,$schedule_id){

        $user = User::where('api_token',$id)->first();
        $schedule = Schedule::where('id',$schedule_id)
                            ->where('user_id',$user->id)
                            ->where('consultant_id',\Auth::user()->id)->first();
       
        return view('consultant/consultant_user',compact('user','schedule'));
    }
}
