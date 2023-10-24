<?php

namespace App\Providers;

use App\Repositories\Interfaces\CountryInterface;
use App\Repositories\Patterns\CountryRepository;
use Illuminate\Support\ServiceProvider;

class CounteryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CountryInterface::class,CountryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
