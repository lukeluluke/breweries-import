<?php

namespace App\Providers;

use App\Brewery\Brewery;
use Illuminate\Support\ServiceProvider;

class BreweryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('Brewery', function($app) {
            return new Brewery;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
