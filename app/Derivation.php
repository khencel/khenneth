<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Derivation extends Model
{
    protected $table = "derivations";

    public function oracle(){
        return $this->belongsTo(Oracle::class,'yao_image');
    }
}
