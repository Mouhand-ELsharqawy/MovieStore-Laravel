<?php

namespace App\Providers;

use App\Repositories\Interfaces\ActorInterface;
use App\Repositories\Patterns\ActorRepository;
use Illuminate\Support\ServiceProvider;

class ActorProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ActorInterface::class,ActorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
