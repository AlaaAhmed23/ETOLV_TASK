<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(
            \App\Repositories\Interfaces\SchoolRepositoryInterface::class,
            \App\Repositories\SchoolRepository::class
        );


        $this->app->bind(
            \App\Repositories\Interfaces\StudentRepositoryInterface::class,
            \App\Repositories\StudentRepository::class,
        );
        $this->app->bind(
            \App\Repositories\Interfaces\SubjectRepositoryInterface::class,
            \App\Repositories\SubjectRepository::class,
    );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}