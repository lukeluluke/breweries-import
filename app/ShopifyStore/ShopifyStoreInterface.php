<?php


namespace App\ShopifyStore;


interface ShopifyStoreInterface
{
    public function getProducts();

    public function addProduct();
}
