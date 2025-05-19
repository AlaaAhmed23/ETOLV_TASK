<?php

namespace App\Http\Controllers;
use App\Services\SubjectService;
use App\Models\Subject;
use Illuminate\Http\Request;

// class SubjectController extends Controller
// {

//     public function index() {
//         return Subject::all();
//     }
    
//     public function store(Request $request) {
//         $subject = Subject::create($request->all());
//         return response()->json($subject, 201);
//     }
    
//     public function show($id) {
//         return Subject::findOrFail($id);
//     }
    
//     public function update(Request $request, $id) {
//         $subject = Subject::findOrFail($id);
//         $subject->update($request->all());
//         return response()->json($subject, 200);
//     }
    
//     public function destroy($id) {
//         Subject::destroy($id);
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
//     public function edit(Subject $subject)
//     {
//         //
//     }

// }



class SubjectController extends Controller
{
    protected $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        return response()->json($this->subjectService->getAll());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subject = $this->subjectService->create($validated);
        return response()->json($subject, 201);
    }

    public function show($id)
    {
        return response()->json($this->subjectService->getById($id));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $subject = $this->subjectService->update($id, $validated);
        return response()->json($subject);
    }

    public function destroy($id)
    {
        $this->subjectService->delete($id);
        return response()->json(null, 204);
    }
}