<?php
namespace App\Repositories;

use App\Models\Subject;

use App\Repositories\Interfaces\SubjectRepositoryInterface;

class SubjectRepository implements SubjectRepositoryInterface
{
    public function all()
    {
        return Subject::all();
    }

    public function find($id)
    {
        return Subject::findOrFail($id);
    }

    public function create(array $data)
    {
        return Subject::create($data);
    }

    public function update($id, array $data)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($data);
        return $subject;
    }

    public function delete($id)
    {
        $subject = Subject::findOrFail($id);
        return $subject->delete();
    }
}