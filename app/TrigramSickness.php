<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrigramSickness extends Model
{
    protected $table = "sickness_trigram";
    public function trigrams(){
        return $this->belongsToMany(Trigram::class);
    }
}
