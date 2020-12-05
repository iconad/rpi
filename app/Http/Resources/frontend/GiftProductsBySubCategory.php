<?php

namespace App\Http\Resources\frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class GiftProductsBySubCategory extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    return
        [
            'id' => $this->sub_id,
            'title' => $this->sub_title,
            'slug' => $this->sub_slug,
            'products' => $this->products,
        ];
    }
}
