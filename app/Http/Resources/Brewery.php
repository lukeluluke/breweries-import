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
            'title' => $this->resource['name'],
            'body_html' => sprintf('<strong>%s</strong>', $this->resource['brewery_type']),
            'vendor' => $this->resource['state'],
            'product_type' => $this->resource['brewery_type'],
            'variants' => [
                [
                    'option1' => $this->resource['state'],
                    'price' => $this->faker->randomFloat(2, $min = 0, $max = 100),
                    'sku' => $this->faker->uuid,
                ]
            ]
        ];
    }
}
