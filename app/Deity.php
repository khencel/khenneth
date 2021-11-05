<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deity extends Model
{
    public function trigrams(){
        return $this->belongsToMany(Trigram::class);
    }
}
