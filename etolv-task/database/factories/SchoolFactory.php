<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    protected $model = \App\Models\School::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company . ' School',
        ];
    }
}