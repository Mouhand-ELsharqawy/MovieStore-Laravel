<?php

namespace App\Providers;

use App\Repositories\Interfaces\InventoryInterface;
use App\Repositories\Patterns\InventoryRepository;
use Illuminate\Support\ServiceProvider;

class InventoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(InventoryInterface::class,InventoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
