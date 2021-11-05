<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaryOracle extends Model
{
    protected $fillable = [
        'user_id','derivation','question','details','is_number','text'
    ];

    public function derivation(){
        return $this->belongsTo(Derivation::class,'derivation','number');
    }
}
