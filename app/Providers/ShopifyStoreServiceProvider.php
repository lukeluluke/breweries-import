<?php

namespace App\Providers;

use App\ShopifyStore\ShopifyStore;
use Illuminate\Support\ServiceProvider;

class ShopifyStoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ShopifyStore', function ($app) {
            return new ShopifyStore;
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
