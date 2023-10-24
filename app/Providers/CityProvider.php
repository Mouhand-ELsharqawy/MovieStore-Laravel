<?php

namespace App\Providers;

use App\Repositories\Interfaces\CityInterface;
use App\Repositories\Patterns\CityRepository;
use Illuminate\Support\ServiceProvider;

class CityProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CityInterface::class,CityRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
