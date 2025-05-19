<?php

namespace Tests\Feature;
use App\Models\Student;
use App\Models\School;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;


function test_create_student()
 {
     $school = School::factory()->create();
     $subject = Subject::factory()->create();
 
     $response = $this->postJson('/api/students', [
         'name' => 'Test Student',
         'school_id' => $school->id,
         'subject_ids' => [$subject->id],
     ]);
 
     $response->assertStatus(201)->assertJsonFragment(['name' => 'Test Student']);
 }
 
}
 