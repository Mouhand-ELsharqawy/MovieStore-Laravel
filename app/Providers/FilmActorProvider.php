<?php

namespace App\Providers;

use App\Repositories\Interfaces\FilmActorInterface;
use App\Repositories\Patterns\FilmActorRepository;
use Illuminate\Support\ServiceProvider;

class FilmActorProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FilmActorInterface::class,FilmActorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
