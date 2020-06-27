<?php


namespace App\ShopifyStore;


interface ShopifyStoreInterface
{
    public function getProducts();

    /**
     * Add a brewery
     * @param $brewery
     * @return mixed
     */
    public function addProduct($brewery);
}
