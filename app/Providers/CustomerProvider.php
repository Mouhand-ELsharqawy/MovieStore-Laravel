<?php

namespace App\Providers;

use App\Repositories\Interfaces\CustomerInterface;
use App\Repositories\Patterns\CustomerRepository;
use Illuminate\Support\ServiceProvider;

class CustomerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CustomerInterface::class,CustomerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
