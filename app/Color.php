<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function trigrams(){
        return $this->belongsToMany(Trigram::class);
    }
}
