<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use App\ShopifyStore\ShopifyStore;


class ShopifyStoreTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {

    }

    protected function _after()
    {

    }

    public function testGetProducts()
    {
        $json = file_get_contents(__DIR__ . '/data/products.json');
        $mock = new MockHandler(
            [
                new Response(200, [], $json),
            ]
        );

        $handlerStack = HandlerStack::create($mock);

        $shopifyStore = new ShopifyStore($handlerStack);
        $products = $shopifyStore->getProducts();
        $this->assertNotNull($products);
        $this->assertEquals(\App\Http\Resources\Product::class, get_class($products->collection->first()));
    }

    public function testCreateProduct() {

        $product = [
            'title' => 'vondale Brewing Co',
            'body_html' => sprintf('<strong>%s</strong>', '123'),
            'vendor' => 'test',
            'product_type' => 'test type',
            'variants' => [
                [
                    'option1' => 'Test',
                    'price' => 12,
                    'sku' => 123455,
                ]
            ]
        ];

        $mock = new MockHandler(
            [
                new Response(200, [], json_encode($product)),
            ]
        );

        $handlerStack = HandlerStack::create($mock);

        $shopifyStore = new ShopifyStore($handlerStack);

        $newProduct = $shopifyStore->addProduct(json_encode($product));

        $this->assertEquals($product, $newProduct);
    }
}
