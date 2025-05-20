<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\StudentService;
use App\Services\SchoolService;
use App\Services\SubjectService;
use Illuminate\Http\Request;

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
            'name' => 'required|string|max:255',
            'school_id' => 'required|exists:schools,id',
            'subject_ids' => 'array',
            'subject_ids.*' => 'exists:subjects,id',
        ]);

        $this->studentService->create($validated);
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = $this->studentService->getById($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = $this->studentService->getById($id);
        $schools = $this->schoolService->getAll();
        $subjects = $this->subjectService->getAll();
        return view('students.edit', compact('student', 'schools', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'school_id' => 'required|exists:schools,id',
            'subject_ids' => 'array',
            'subject_ids.*' => 'exists:subjects,id',
        ]);

        $this->studentService->update($id, $validated);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $this->studentService->delete($id);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}