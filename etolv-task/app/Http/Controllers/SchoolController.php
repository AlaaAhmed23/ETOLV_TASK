<?php


namespace App\Http\Controllers;
use App\Services\SchoolService;
use App\Models\School;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\SchoolRepositoryInterface;


class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index()
    {
        // return response()->json($this->schoolService->getAll());

        $schools = $this->schoolService->getAll();
        return view('schools.index', compact('schools'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // $school = $this->schoolService->create($validated);
        // return response()->json($school, 201);

        $this->schoolService->create($request->all());
        return redirect()->route('schools.index')->with('success', 'School created successfully');
        
    }

    public function show($id)
    {
        // return response()->json($this->schoolService->getById($id));
        $school = $this->schoolService->getById($id);
        return view('schools.show', compact('school'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        // $school = $this->schoolService->update($id, $validated);
        // return response()->json($school);

        $this->schoolService->update($id, $request->all());
        return redirect()->route('schools.index')->with('success', 'School updated successfully');
    }

    public function destroy($id)
    {
        // $this->schoolService->delete($id);
        // return response()->json(null, 204);
        $this->schoolService->delete($id);
        return redirect()->route('schools.index')->with('success', 'School deleted');
    }

    public function create()
    {
        return view('schools.create');
    }
    public function edit($id)
    {
        $school = $this->schoolService->getById($id);
        return view('schools.edit', compact('school'));
    }


}