<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'school_id']; // Add other student fields

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withTimestamps();
    }



}