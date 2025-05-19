<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Subject;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            SchoolSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
        ]);
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create School
        $school = School::create([
            'name' => 'Cairo High School',
        ]);

        // Create Subject
        $subject = Subject::create([
            'name' => 'Mathematics',
        ]);

        // Create Student and attach subject
        $student = Student::create([
            'name' => 'Alaa Ahmed',
            'school_id' => $school->id,
        ]);

        // Attach subject to student
        $student->subjects()->attach([$subject->id]);
    
    }

}