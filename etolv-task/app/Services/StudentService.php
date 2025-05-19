<?php
namespace App\Services;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentService {
protected $studentRepo;
public function __construct(StudentRepositoryInterface $studentRepo) {
$this->studentRepo = $studentRepo;
}
public function getAll() { return $this->studentRepo->all(); }
public function getById($id) { return $this->studentRepo->find($id); }
public function create(array $data) { return $this->studentRepo->create($data); }
public function update($id, array $data) { return $this->studentRepo->update($id, $data); }
public function delete($id) { return $this->studentRepo->delete($id); }
}