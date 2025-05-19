<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\School;

class StudentFactory extends Factory
{
    protected $model = \App\Models\Student::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'school_id' => School::factory(),  // Create a school or you can pass existing school ID manually
        ];
    }
}