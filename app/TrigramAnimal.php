<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrigramAnimal extends Model
{
    protected $table = "animal_trigram";
    public function trigrams(){
        return $this->belongsToMany(Trigram::class);
    }
}
