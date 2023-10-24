<?php

namespace App\Providers;

use App\Repositories\Interfaces\LanguageInterface;
use App\Repositories\Patterns\LanguageRepository;
use Illuminate\Support\ServiceProvider;

class LanguageProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LanguageInterface::class,LanguageRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
