<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrigramDeity extends Model
{
    protected $table = "deity_trigram";
    public function trigrams(){
        return $this->belongsToMany(Trigram::class);
    }
}
