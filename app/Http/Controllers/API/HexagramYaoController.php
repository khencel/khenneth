<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hexagram;
use App\HexagramYao;
use App\HexagramYao2;
use App\HexagramYao3;
use App\HexagramYao4;
use App\HexagramYao5;
use App\HexagramYao6;

class HexagramYaoController extends Controller
{
    public function hexagram($id){
        return Hexagram::find($id);
    }

    public function transformGua($gua){
        $gua = explode(',',$gua);
        $code = array();
        foreach ($gua as $value) {
            if($value == 3){
                $value = "0"; 
            }
            if($value == 4){
                $value = "1"; 
            }
            $code[] = $value;
        }
        $code = implode('',$code);
        return Hexagram::where('code',$code)->first();
    }

    public function hexYao(Request $request){
        if($request->yao == 1){
            HexagramYao::updateOrCreate([
                'hexagram_id' => $request->hexagram_id
            ],$request->all());
        }
        if($request->yao == 2){
            HexagramYao2::updateOrCreate([
                'hexagram_id' => $request->hexagram_id
            ],$request->all());
        }
        if($request->yao == 3){
            HexagramYao3::updateOrCreate([
                'hexagram_id' => $request->hexagram_id
            ],$request->all());
        }
        if($request->yao == 4){
            HexagramYao4::updateOrCreate([
                'hexagram_id' => $request->hexagram_id
            ],$request->all());
        }
        if($request->yao == 5){
            HexagramYao5::updateOrCreate([
                'hexagram_id' => $request->hexagram_id
            ],$request->all());
        }
        if($request->yao == 6){
            HexagramYao6::updateOrCreate([
                'hexagram_id' => $request->hexagram_id
            ],$request->all());
        }
    }

    public function show($id,$yao){
        if($yao == 1){
            return HexagramYao::where('hexagram_id',$id)->first();
        }
        if($yao == 2){
            return HexagramYao2::where('hexagram_id',$id)->first();
        }
        if($yao == 3){
            return HexagramYao3::where('hexagram_id',$id)->first();
        }
        if($yao == 4){
            return HexagramYao4::where('hexagram_id',$id)->first();
        }
        if($yao == 5){
            return HexagramYao5::where('hexagram_id',$id)->first();
        }
        if($yao == 6){
            return HexagramYao6::where('hexagram_id',$id)->first();
        }
    }
}
