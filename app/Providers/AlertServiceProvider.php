<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
{
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
        $alertJson = file_get_contents(base_path('resources/alerts.json'));
        $alertData = json_decode($alertJson);

        // Share all alertData to all the views
        View::share('alertData', [$alertData]);
    }
}
