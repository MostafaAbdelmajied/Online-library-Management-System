<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvoder extends ServiceProvider
{
    public const HOME = '/';
    public const ADMIN_HOME = '/admin';

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
