<?php

namespace App\Providers;

use App\Brewery\Brewery;
use App\BrewerySync\BrewerySync;
use App\ShopifyStore\ShopifyStore;
use Illuminate\Support\ServiceProvider;

class BrewerySyncServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('BrewerySync', function ($app) {
            return new BrewerySync(new Brewery(), new ShopifyStore());
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
