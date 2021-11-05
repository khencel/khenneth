<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = "role_user";

    public function user(){
        return $this->belongsTo(User::class);
    }
}
