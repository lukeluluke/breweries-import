<?php

namespace App\Brewery;

use GuzzleHttp\Client;
use App\Http\Resources\Brewery as BreweryResource;

class Brewery implements BreweryInterface {

    private $client = null;

    public function __construct()
    {
        $headers = [
            'Content-Type' => 'application/json',
        ];
        $this->client = new Client(
            [
                'headers' => $headers
            ]
        );

    }

   public function getBreweryList()
   {
      try {
          $endpoint = 'https://api.openbrewerydb.org/breweries';
          $response = $this->getClient()->get($endpoint);
          return BreweryResource::collection(json_decode($response->getBody(), true));
      } catch (\Exception $exception) {

      }
   }

   public function getClient() {
        return $this->client;
   }
}
