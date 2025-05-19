<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Add other subject fields

    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }



}