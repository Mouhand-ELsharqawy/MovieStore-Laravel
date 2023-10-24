<?php

namespace App\Providers;

use App\Repositories\Interfaces\StaffInterface;
use App\Repositories\Patterns\StaffRepository;
use Illuminate\Support\ServiceProvider;

class StaffProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StaffInterface::class,StaffRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
