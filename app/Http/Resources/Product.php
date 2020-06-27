<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource['id'],
            'title' => $this->resource['title'],
            'vendor' => $this->resource['vendor'],
            'product_type' => $this->resource['product_type'],
            'variants' => array_map(function ($item) {
                return [
                    'id' => $item['id'],
                    'product_id' => $item['product_id'],
                    'price' => $item['price'],
                    'sku' => $item['sku'],
                    'option1' => $item['option1']
                ];
            }, $this->resource['variants'])
        ];
    }
}
