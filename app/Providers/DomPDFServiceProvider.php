<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DomPDFServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('pdf', function() {
            return new \Barryvdh\DomPDF\Facade\Pdf();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}