<?php

namespace App\Http\Controllers;
use App\Services\StudentService;
use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        return response()->json($this->studentService->getAll());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'school_id' => 'required|exists:schools,id',
            'subjects' => 'array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $student = $this->studentService->create($validated);
        return response()->json($student, 201);
    }

    public function show($id)
    {
        return response()->json($this->studentService->getById($id));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'school_id' => 'sometimes|required|exists:schools,id',
            'subjects' => 'sometimes|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $student = $this->studentService->update($id, $validated);
        return response()->json($student);
    }

    public function destroy($id)
    {
        $this->studentService->delete($id);
        return response()->json(null, 204);
    }
}