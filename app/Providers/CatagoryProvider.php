<?php

namespace App\Providers;

use App\Repositories\Interfaces\CatagoryInterface;
use App\Repositories\Patterns\CatagoryRepository;
use Illuminate\Support\ServiceProvider;

class CatagoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CatagoryInterface::class,CatagoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
