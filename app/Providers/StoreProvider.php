<?php

namespace App\Providers;

use App\Repositories\Interfaces\StoreInterface;
use App\Repositories\Patterns\StoreRepository;
use Illuminate\Support\ServiceProvider;

class StoreProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StoreInterface::class,StoreRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
