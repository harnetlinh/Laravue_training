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
        if($this->type_id == 1)
        {
            return [
                "ProductType" => "Candy",
                "ProductID" => $this->product_id,
                "ProductName" => $this->product_name,
                "ProductDesc" => $this->desc,
                "ProductPrice" => $this->price,
                "SugarPercent" => $this->sugar_percent,
            ];
        }
        else 
        {
            return [
                "ProductType" => "Toy",
                "ProductID" => $this->product_id,
                "ProductName" => $this->product_name,
                "ProductDesc" => $this->desc,
                "ProductPrice" => $this->price,
                "Material" => $this->material,
            ];
        }
    }
}
