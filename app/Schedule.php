<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    protected $table = "schedule_user";
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function appointmentUser(){
        return $this->hasMany(User::class,'id','user_id');
    }

    public function consultant(){
        return $this->hasMany(User::class,'id','consultant_id');
    }
}
