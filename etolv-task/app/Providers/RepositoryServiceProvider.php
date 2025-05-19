<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\SchoolRepositoryInterface;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use App\Repositories\SchoolRepository;
use App\Repositories\StudentRepository;
use App\Repositories\SubjectRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // //
        // $this->app->bind(
        //     \App\Repositories\Interfaces\SchoolRepositoryInterface::class,
        //     \App\Repositories\SchoolRepository::class
        // );


        // $this->app->bind(
        //     \App\Repositories\Interfaces\StudentRepositoryInterface::class,
        //     \App\Repositories\StudentRepository::class,
        // );
        // $this->app->bind(
        //     \App\Repositories\Interfaces\SubjectRepositoryInterface::class,
        //     \App\Repositories\SubjectRepository::class,
        // );

        $this->app->bind(SchoolRepositoryInterface::class, SchoolRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
   
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}