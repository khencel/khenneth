<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrigramPeople extends Model
{
    protected $table = "people_trigram";

    public function trigrams(){
        return $this->belongsToMany(Trigram::class);
    }
}
