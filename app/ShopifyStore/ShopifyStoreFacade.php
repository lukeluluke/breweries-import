<?php


namespace App\ShopifyStore;


use Illuminate\Support\Facades\Facade;

class ShopifyStoreFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ShopifyStore';
    }

}
