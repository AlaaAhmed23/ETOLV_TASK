<?php

namespace App\Http\Controllers;

use App\Services\SubjectService;
use App\Models\Subject;
use Illuminate\Http\Request;


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
