<?php

namespace App\Brewery;

use Illuminate\Support\Facades\Facade;

class BreweryFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'Brewery';
    }
}
