<?php

namespace App\Providers;

use App\Repositories\Interfaces\FilmCatagoryInterface;
use App\Repositories\Patterns\FilmCatagoryRepository;
use Illuminate\Support\ServiceProvider;

class FilmCatagoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FilmCatagoryInterface::class,FilmCatagoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
