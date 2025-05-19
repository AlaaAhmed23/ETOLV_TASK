<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\SchoolRepositoryInterface;


class SchoolController extends Controller
{
    protected $schoolRepo;
    public function __construct(SchoolRepositoryInterface $schoolRepo) {
        $this->schoolRepo = $schoolRepo;
    }
    
    /**
     * Display a listing of the resource.
     */
    // Show All Schools
    public function index()
    {
        //
        // return $this->schoolRepo->all();
        return School::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // Add New School
    public function store(Request $request)
    {
        //
        $school = School::create($request->all());
        return response()->json($school, 201);
    }
   
    // Show Only One School
    public function show(School $school)
    {
        //
        // return School::findOrFail($id);
        return $school;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    // Update School
    public function update(Request $request, School $school)
    {
        // $school = School::findOrFail($id);
        $school->update($request->all());
        return response()->json($school, 200);
    }

    // Delete School
    public function destroy(School $school)
    {
        $school->delete();
        return response()->json(null, 204);
    } 
}