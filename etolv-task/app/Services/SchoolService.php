<?php
namespace App\Services;
use App\Repositories\Interfaces\SchoolRepositoryInterface;

class SchoolService
{
    protected $schoolRepo;

    public function __construct(SchoolRepositoryInterface $schoolRepo)
    {
        $this->schoolRepo = $schoolRepo;
    }

    public function getAll()
    {
        return $this->schoolRepo->all();
    }

    public function getById($id)
    {
        return $this->schoolRepo->find($id);
    }

    public function create(array $data)
    {
        return $this->schoolRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->schoolRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->schoolRepo->delete($id);
    }
}