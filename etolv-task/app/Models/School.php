<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // I Need To Add any other fillable fields



    public function students()
    {
        return $this->hasMany(Student::class);
        
    }
}