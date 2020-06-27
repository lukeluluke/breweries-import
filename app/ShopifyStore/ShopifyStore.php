<?php

namespace App\ShopifyStore;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use App\Http\Resources\Product as ProductResource;

class ShopifyStore implements ShopifyStoreInterface
{
    private $client = null;
    private $shop = null;
    private $apiKey = null;
    private $apiPassword = null;
    private $headers = [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'
    ];

    public function __construct()
    {
        $this->shop = env('SHOPIFY_STORE_URL', '');
        $this->apiKey = env('SHOPIFY_API_KEY', '');
        $this->apiPassword = env('SHOPIFY_API_PASSWORD', '');

        $this->client = new Client(
            [
                'base_uri' => $this->getBaseUrl(),
            ]
        );

    }

    /**
     * Get request url
     * @param $url
     * @return string
     */
    public function getBaseUrl()
    {
        return sprintf('https://%s:%s@%s/admin/api/2020-04/', $this->apiKey, $this->apiPassword, $this->shop);
    }

    public function getProducts()
    {
        try {
            $request = new Request('GET', 'products.json', $this->headers);
            $response = $this->client->send($request);
            $data = json_decode($response->getBody(), true);
            return ProductResource::collection($data['products']);
        } catch (ClientException $exception) {
            /**
             * Todo add log
             */
            return null;
        }
    }

    public function addProduct($brewery)
    {

        try {
            $breweryObject = json_decode($brewery, true);
            $data = [
                'product' => $breweryObject
            ];

            $request = new Request('POST', 'products.json', $this->headers, json_encode($data));
            $response = $this->client->send($request);
            return $breweryObject;
        } catch (ClientException $exception) {
            /**
             * Todo add log
             */
            return null;
        }
    }
}
