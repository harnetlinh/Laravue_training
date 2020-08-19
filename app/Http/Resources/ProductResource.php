<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "ProductID" => $this->product_id,
            "ProductName" => $this->name,
            "ProductDesc" => $this->desc,
            "ProductPrice" => $this->price,
        ];
    }
}
