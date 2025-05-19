<?php


namespace App\Http\Controllers;
use App\Services\SchoolService;
use App\Models\School;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\SchoolRepositoryInterface;


// class SchoolController extends Controller
// {
//     protected $schoolRepo;
//     public function __construct(SchoolRepositoryInterface $schoolRepo) {
//         $this->schoolRepo = $schoolRepo;
//     }
    
//     /**
//      * Display a listing of the resource.
//      */
//     // Show All Schools
//     public function index()
//     {
//         //
//         // return $this->schoolRepo->all();
//         // return School::all();
//         return $this->SchoolService->getAll();

//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     // Add New School
//     public function store(Request $request)
//     {
//         //
//         $school = School::create($request->all());
//         return response()->json($school, 201);
//     }
   
//     // Show Only One School
//     public function show(School $school)
//     {
//         //
//         // return School::findOrFail($id);
//         return $school;

//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(School $school)
//     {
//         //
//     }

//     // Update School
//     public function update(Request $request, School $school)
//     {
//         // $school = School::findOrFail($id);
//         $school->update($request->all());
//         return response()->json($school, 200);
//     }

//     // Delete School
//     public function destroy(School $school)
//     {
//         $school->delete();
//         return response()->json(null, 204);
//     }

// }namespace App\Http\Controllers;


class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index()
    {
        return response()->json($this->schoolService->getAll());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $school = $this->schoolService->create($validated);
        return response()->json($school, 201);
    }

    public function show($id)
    {
        return response()->json($this->schoolService->getById($id));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $school = $this->schoolService->update($id, $validated);
        return response()->json($school);
    }

    public function destroy($id)
    {
        $this->schoolService->delete($id);
        return response()->json(null, 204);
    }
}