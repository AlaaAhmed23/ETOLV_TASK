<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\SubjectService;
use Illuminate\Http\Request;

class SubjectViewController extends Controller
{
    protected $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        $subjects = $this->subjectService->getAll();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->subjectService->create($validated);
        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    public function show($id)
    {
        $subject = $this->subjectService->getById($id);
        return view('subjects.show', compact('subject'));
    }

    public function edit($id)
    {
        $subject = $this->subjectService->getById($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->subjectService->update($id, $validated);
        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy($id)
    {
        $this->subjectService->delete($id);
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}