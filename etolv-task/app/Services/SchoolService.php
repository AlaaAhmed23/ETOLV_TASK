<?php
namespace App\Services;
use App\Repositories\Interfaces\SchoolRepositoryInterface;

class SchoolService {
    protected $schoolRepo;
    public function __construct(SchoolRepositoryInterface $schoolRepo) {
        $this->schoolRepo = $schoolRepo;
    }
    // استخدم دوال الـ Repository هنا حسب احتياجك
}