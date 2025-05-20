<?php
namespace App\Services;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Models\Student;

class StudentService
{
    protected $studentRepo;

    public function __construct(StudentRepositoryInterface $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    public function getAll()
    {
        return $this->studentRepo->all();
    }

    public function getById($id)
    {
        return $this->studentRepo->find($id);
    }

    public function create(array $data)
    {
        $subjects = $data['subjects'] ?? [];
        unset($data['subjects']);

        $student = $this->studentRepo->create($data);

        if (!empty($subjects)) {
            $student->subjects()->sync($subjects);
        }

        return $student->load('school', 'subjects');
    }

    public function update($id, array $data)
    {
        $subjects = $data['subjects'] ?? null;
        unset($data['subjects']);

        $student = $this->studentRepo->update($id, $data);

        if ($subjects !== null) {
            $student->subjects()->sync($subjects);
        }

        return $student->load('school', 'subjects');
    }

    public function delete($id)
    {
        return $this->studentRepo->delete($id);
    }
}