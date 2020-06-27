<?php


namespace App\BrewerySync;


use Illuminate\Support\Facades\Facade;

class BrewerySyncFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'BrewerySync';
    }
}
