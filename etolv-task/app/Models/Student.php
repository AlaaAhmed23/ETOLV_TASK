<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    
    public function school() {
        return $this->belongsTo(School::class);
    }
    public function subjects() {
        return $this->belongsToMany(Subject::class);
    }


}