<?php

namespace App\Providers;

use App\Repositories\Interfaces\FilmInterface;
use App\Repositories\Patterns\FilmRepository;
use Illuminate\Support\ServiceProvider;

class FilmProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FilmInterface::class,FilmRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
