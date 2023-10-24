<?php

namespace App\Providers;

use App\Repositories\Interfaces\AddressInterface;
use App\Repositories\Patterns\AddressRepository;
use Illuminate\Support\ServiceProvider;

class AddressProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AddressInterface::class,AddressRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
