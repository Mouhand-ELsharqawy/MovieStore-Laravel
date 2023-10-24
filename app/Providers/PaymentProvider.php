<?php

namespace App\Providers;

use App\Repositories\Interfaces\PaymentInterface;
use App\Repositories\Patterns\PaymentRepository;
use Illuminate\Support\ServiceProvider;

class PaymentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentInterface::class,PaymentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
