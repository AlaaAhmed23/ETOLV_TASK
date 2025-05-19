<?php

namespace App\Repositories;

use App\Models\School;
use App\Repositories\Interfaces\SchoolRepositoryInterface;

// class SchoolRepository implements SchoolRepositoryInterface {
// public function all() { return School::all(); }
// public function find($id) { return School::find($id); }
// public function create(array $data) { return School::create($data); }
// public function update($id, array $data) {
// $school = School::find($id);
// $school->update($data);
// return $school;
// }
// public function delete($id) { return School::destroy($id); }

// }


class SchoolRepository implements SchoolRepositoryInterface
{
    public function all()
    {
        return School::all();
    }

    public function find($id)
    {
        return School::findOrFail($id);
    }

    public function create(array $data)
    {
        return School::create($data);
    }

    public function update($id, array $data)
    {
        $school = School::findOrFail($id);
        $school->update($data);
        return $school;
    }

    public function delete($id)
    {
        $school = School::findOrFail($id);
        return $school->delete();
    }
}