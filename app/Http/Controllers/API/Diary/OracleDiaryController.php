<?php

namespace App\Http\Controllers\API\Diary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DiaryOracle;
use App\Derivation;
use App\Alphabet;

class OracleDiaryController extends Controller
{
    public function store(Request $request){
        $this->oracleValidation($request);
        DiaryOracle::create([
            'user_id' => \Auth::user()->id,
            'is_number' => 1,
            'derivation' => $request->oracle_number,
            'question' => $request->question,
            'details' => $request->details
        ]);
    }

    public function show(){
        return DiaryOracle::with('derivation.oracle')
                            ->where('user_id',\Auth::user()->id)
                            ->where('is_number',1)
                            ->get();
    }

    public function showText(){
        return DiaryOracle::with('derivation.oracle')
                            ->where('user_id',\Auth::user()->id)
                            ->where('is_number',0)
                            ->get();
    }

    public function oracleValidation($request){
        $request->validate([
            'question' => 'required',
            'details' => 'required'
        ]);
    }

    public function storeTextOracle(Request $request){
        $this->oracleValidation($request);
        $derivationNumber = $this->getDerivation($request);
        DiaryOracle::create([
            'user_id' => \Auth::user()->id,
            'is_number' => 0,
            'derivation' => $derivationNumber,
            'question' => $request->question,
            'details' => $request->details,
            'text' => implode('',$request->oracle_text),
        ]);
    }

    public function getDerivation($request){
        $oracleText = $request->oracle_text;
        $oracle = array();

        foreach ($oracleText as $value) {
            $alphabet = Alphabet::where('alphabet',$value)->first();
            $oracle[] = $alphabet->number;
        }
        $oracleTextFormat = implode("", $oracle);
        return $oracleTextFormat;
    }
}
