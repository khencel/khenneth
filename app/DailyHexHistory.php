<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyHexHistory extends Model
{
    protected $guarded = [];

    public function hexagram(){
        return $this->belongsTo(Hexagram::class);
    }
}
