<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trigram extends Model
{
    protected $guarded =[];
    public function natures(){
        return $this->belongsToMany(Nature::class);
    }

    public function natureTrigram(){
        return $this->hasMany(NatureTrigram::class);
    }

    public function people(){
        return $this->belongsToMany(People::class);
    }

    public function triPeople(){
        return $this->hasMany(TrigramPeople::class);
    }    

    public function animals(){
        return $this->belongsToMany(Animal::class);
    }

    public function triAnimal(){
        return $this->hasMany(TrigramAnimal::class);
    } 

    public function bodyParts(){
        return $this->belongsToMany(BodyPart::class);
    }

    public function triBodyPart(){
        return $this->hasMany(TrigramBodyPart::class);
    }

    public function sickness(){
        return $this->belongsToMany(Sickness::class);
    }

    public function triSickness(){
        return $this->hasMany(TrigramSickness::class);
    }

    public function color(){
        return $this->belongsToMany(Color::class);
    }

    public function triColor(){
        return $this->hasMany(TrigramColor::class);
    }

    public function deity(){
        return $this->belongsToMany(Deity::class);
    }

    public function triDeity(){
        return $this->hasMany(TrigramDeity::class);
    }

    public function journal(){
        return $this->belongsTo(Journal::class);
    }
    
}
