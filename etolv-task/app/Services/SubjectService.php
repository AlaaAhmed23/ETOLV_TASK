<?php
namespace App\Services;
use App\Repositories\Interfaces\SubjectRepositoryInterface;

class SubjectService {
protected $subjectRepo;
public function __construct(SubjectRepositoryInterface $subjectRepo) {
$this->subjectRepo = $subjectRepo;
}
public function getAll() { return $this->subjectRepo->all(); }
public function getById($id) { return $this->subjectRepo->find($id); }
public function create(array $data) { return $this->subjectRepo->create($data); }
public function update($id, array $data) { return $this->subjectRepo->update($id, $data); }
public function delete($id) { return $this->subjectRepo->delete($id); }
}