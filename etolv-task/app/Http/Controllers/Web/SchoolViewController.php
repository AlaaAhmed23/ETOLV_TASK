<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\SchoolService;
use Illuminate\Http\Request;

class SchoolViewController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index()
    {
        $schools = $this->schoolService->getAll();
        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->schoolService->create($validated);
        return redirect()->route('schools.index')->with('success', 'School created successfully.');
    }

    public function show($id)
    {
        $school = $this->schoolService->getById($id);
        return view('schools.show', compact('school'));
    }

    public function edit($id)
    {
        $school = $this->schoolService->getById($id);
        return view('schools.edit', compact('school'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->schoolService->update($id, $validated);
        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }

    public function destroy($id)
    {
        $this->schoolService->delete($id);
        return redirect()->route('schools.index')->with('success', 'School deleted successfully.');
    }
}