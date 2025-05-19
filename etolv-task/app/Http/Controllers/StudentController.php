<?php

namespace App\Http\Controllers;
use App\Services\StudentService;
use App\Models\Student;
use Illuminate\Http\Request;

// class StudentController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     protected $studentService;

//     public function __construct(StudentService $studentService)
//     {
//         $this->studentService = $studentService;
//     }
    
    
//     public function index() {
//         // return $this->studentService->getAll();
//         return Student::with(['school', 'subjects'])->get();
//     }

//     public function store(Request $request) {
//         $student = Student::create([
//             'name' => $request->name,
//             'school_id' => $request->school_id,
//         ]);
//         if ($request->subjects) {
//             $student->subjects()->sync($request->subjects);
//         }
//         return response()->json($student->load(['school', 'subjects']), 201);
//     }

//     public function show($id) {
//         return Student::with(['school', 'subjects'])->findOrFail($id);
//     }

//     public function update(Request $request, $id) {
//         $student = Student::findOrFail($id);
//         $student->update($request->all());
//         if ($request->subjects) {
//             $student->subjects()->sync($request->subjects);
//         }
//         return response()->json($student->load(['school', 'subjects']), 200);
//     }

//     public function destroy($id) {
//         Student::destroy($id);
//         return response()->json(null, 204);
//     }


//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }


//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Student $student)
//     {
//         //
//     }
// }



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