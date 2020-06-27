<?php


namespace App\BrewerySync;


use App\Brewery\Brewery;
use App\ShopifyStore\ShopifyStore;

class BrewerySync implements BrewerySyncInterface
{

    private $brewery;
    private $shopifyStore;

    public function __construct(Brewery $brewery, ShopifyStore $shopifyStore)
    {
        $this->brewery = $brewery;
        $this->shopifyStore = $shopifyStore;
    }

    public function sync()
    {
        return $this->brewery->getBreweryList();
    }
}
