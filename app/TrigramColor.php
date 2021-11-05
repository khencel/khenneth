<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrigramColor extends Model
{
    protected $table = "color_trigram";
    public function trigrams(){
        return $this->belongsToMany(Trigram::class);
    }
}
