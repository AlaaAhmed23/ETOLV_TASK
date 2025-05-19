<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Subject;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Fetch all subjects for assigning later
        $subjects = Subject::all();

        Student::factory()
            ->count(20)
            ->create()
            ->each(function ($student) use ($subjects) {
                // Assign random 1 to 5 subjects to student
                $student->subjects()->sync(
                    $subjects->random(rand(1, 5))->pluck('id')->toArray()
                );
            });
    }
}