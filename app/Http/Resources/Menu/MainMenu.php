<?php

namespace App\Http\Resources\Menu;

use Illuminate\Http\Resources\Json\JsonResource;

class MainMenu extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'categories' => $this->categories
        ];
    }
}
