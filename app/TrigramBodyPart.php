<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrigramBodyPart extends Model
{
    protected $table = "body_part_trigram";
    public function trigrams(){
        return $this->belongsToMany(Trigram::class);
    }
}
