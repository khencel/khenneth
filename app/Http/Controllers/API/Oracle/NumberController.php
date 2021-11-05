<?php

namespace App\Http\Controllers\API\Oracle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Derivation;

class NumberController extends Controller
{
    public function numberOracle(Request $request){
        $derivation = Derivation::with('oracle')->where('number',$request->oracle_number)->first();
        return $derivation->oracle;
    }
}
