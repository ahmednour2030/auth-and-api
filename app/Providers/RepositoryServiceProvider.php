<?php

namespace App\Providers;

use App\Repository\Contracts\{
    AuthInterface,
    OrderInterface,
    schoolInterface,
    StudentInterface
};
use App\Repository\Eloquent\{
    AuthRepository,
    OrderRepository,
    SchoolRepository,
    StudentRepository
};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(OrderInterface::class, OrderRepository::class);
        $this->app->bind(SchoolInterface::class, SchoolRepository::class);
        $this->app->bind(StudentInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
