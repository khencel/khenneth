<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function journal(){
        return $this->hasMany(Journal::class,'id','type');
    }
}
