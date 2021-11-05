<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyHex extends Model
{
    protected $table = "daily_hex";
    protected $guarded = [];

    public function hexagram(){
        return $this->belongsTo(Hexagram::class);
    }
}
