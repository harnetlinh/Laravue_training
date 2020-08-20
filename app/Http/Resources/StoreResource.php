<?php

namespace App\Http\Resources;

use App\ProductType;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $store = ProductType::get('name')->where('type_id',$this->type_id);
        error_log($store);
        return [
            "id" => $this->store_id,
            "name" => $this->name,
            //"type" => $store->name,
            "type_id" => $this->type_id
        ];
    }
}
