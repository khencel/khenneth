<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hexagram extends Model
{
    protected $table = "hexagram";
    protected $guarded = [];

    public function dailyHex(){
        return $this->hasOne(DailyHex::class);
    }

    public function journal_original(){
        return $this->belongsTo(Journal::class, 'id','original_hex_id');
    }

    public function journal_transform(){
        return $this->belongsTo(Journal::class, 'id','transform_hex_id');
    }

    public function nobleman(){
        return $this->hasMany(Nobleman::class);
    }

    public function opening(){
        return $this->hasMany(Opening::class);
    }

    public function weather(){
        return $this->hasMany(Weather::class);
    }

    public function luck(){
        return $this->hasMany(Luck::class);
    }

    public function wealth(){
        return $this->hasMany(Wealth::class);
    }

    public function mother(){
        return $this->hasMany(Mother::class);
    }

    public function relationship(){
        return $this->hasMany(Relationship::class);
    }

    public function examination(){
        return $this->hasMany(Examination::class);
    }

    public function business(){
        return $this->hasMany(Business::class);
    }

    public function family(){
        return $this->hasMany(Family::class);
    }

    public function legal(){
        return $this->hasMany(Legal::class);
    }

    public function travel(){
        return $this->hasMany(Travel::class);
    }

    public function health(){
        return $this->hasMany(Health::class);
    }

    public function properties(){
        return $this->hasMany(Property::class);
    }
}
