<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Services\SchoolService;
use App\Services\SubjectService;

class StudentViewController extends Controller
{
    protected $studentService;
    protected $schoolService;
    protected $subjectService;

    public function __construct(StudentService $studentService, SchoolService $schoolService, SubjectService $subjectService)
    {
        $this->studentService = $studentService;
        $this->schoolService = $schoolService;
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        $students = $this->studentService->getAll();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $schools = $this->schoolService->getAll();
        $subjects = $this->subjectService->getAll();
        return view('students.create', compact('schools', 'subjects'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'school_id' => 'required|int',  
            'subject_ids' => 'nullable|array',
            'subject_ids.*' => 'int',
        ]);
        $this->studentService->create($validated);
        return redirect()->route('students.index')->with('success', 'Student created.');
    }
    public function show($id)
    {
        $student = $this->studentService->getById($id);
        if (!$student) {
            abort(404);
        }

        return view('students.show', compact('student'));
    }
    public function edit($id)
    {
        $student = $this->studentService->getById($id);
        if (!$student) {
            return redirect()->route('students.index')->withErrors('Student not found.');
        }
        $schools = $this->schoolService->getAll();
        $subjects = $this->subjectService->getAll();
        return view('students.edit', compact('student', 'schools', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'school_id' => 'required|string|uuid',
            'subject_ids' => 'array',
            'subject_ids.*' => 'string|uuid', 
        ]);
    
        $student = $this->studentService->update($id, $data);
    
        return redirect()->route('students.edit', $id)
                         ->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $this->studentService->delete($id);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}