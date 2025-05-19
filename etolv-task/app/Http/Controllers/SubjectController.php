<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index() {
        return Subject::all();
    }
    
    public function store(Request $request) {
        $subject = Subject::create($request->all());
        return response()->json($subject, 201);
    }
    
    public function show($id) {
        return Subject::findOrFail($id);
    }
    
    public function update(Request $request, $id) {
        $subject = Subject::findOrFail($id);
        $subject->update($request->all());
        return response()->json($subject, 200);
    }
    
    public function destroy($id) {
        Subject::destroy($id);
        return response()->json(null, 204);
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

}