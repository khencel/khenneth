<?php

namespace App\Http\Controllers\API\Oracle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Derivation;
use App\Alphabet;

class TextController extends Controller
{
    public function textOracle(Request $request){
        $oracleText = $request->oracle_text;
        $oracle = array();

        foreach ($oracleText as $value) {
            $alphabet = Alphabet::where('alphabet',$value)->first();
            $oracle[] = $alphabet->number;
        }

        $oracleTextFormat = implode(",", $oracle);
        $oracleNumberFormat = str_replace(",","",$oracleTextFormat);

        $derivation = Derivation::with('oracle')->where('number',$oracleNumberFormat)->first();
        return $derivation->oracle;
    }
}
