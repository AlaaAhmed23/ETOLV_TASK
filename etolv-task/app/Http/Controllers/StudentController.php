<?php

namespace App\Http\Controllers;
use App\Services\StudentService;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    
    
    public function index() {
        // return $this->studentService->getAll();
        return Student::with(['school', 'subjects'])->get();
    }

    public function store(Request $request) {
        $student = Student::create([
            'name' => $request->name,
            'school_id' => $request->school_id,
        ]);
        if ($request->subjects) {
            $student->subjects()->sync($request->subjects);
        }
        return response()->json($student->load(['school', 'subjects']), 201);
    }

    public function show($id) {
        return Student::with(['school', 'subjects'])->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        if ($request->subjects) {
            $student->subjects()->sync($request->subjects);
        }
        return response()->json($student->load(['school', 'subjects']), 200);
    }

    public function destroy($id) {
        Student::destroy($id);
        return response()->json(null, 204);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }
}