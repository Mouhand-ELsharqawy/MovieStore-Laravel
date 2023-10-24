<?php

namespace App\Providers;

use App\Repositories\Interfaces\RentalInterface;
use App\Repositories\Patterns\RentalRepository;
use Illuminate\Support\ServiceProvider;

class RentalProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RentalInterface::class,RentalRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
