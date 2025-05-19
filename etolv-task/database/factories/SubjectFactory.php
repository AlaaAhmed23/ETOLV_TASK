<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = \App\Models\Subject::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}