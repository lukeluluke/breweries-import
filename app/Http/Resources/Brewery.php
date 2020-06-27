<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Faker\Factory as Faker;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class Brewery extends JsonResource
{
    private $faker;

    public function __construct($resource)
    {
        $this->faker = Faker::create();
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        return  [
            'id' => $this->resource['id'],
            'name' => $this->resource['name'],
            'type' => $this->resource['brewery_type'],
            'phone' => $this->resource['phone'],
            'city' => $this->resource['city'],
            'country' => $this->resource['country'],
            'postal_code' => $this->resource['postal_code'],
            'price' => $this->faker->randomFloat(2, $min = 0, $max = 100)
        ];
    }
}
