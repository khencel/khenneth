<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NatureTrigram extends Model
{
    protected $table = "nature_trigram";
    public function trigram(){
        return $this->belongsToMany(Trigram::class);
    }
}
