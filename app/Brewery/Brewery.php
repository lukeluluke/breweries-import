<?php

namespace App\Brewery;

class Brewery implements BreweryInterface {

    public function __construct()
    {

    }

   public function getBreweryList()
   {
       echo 'Get list';
   }
}
