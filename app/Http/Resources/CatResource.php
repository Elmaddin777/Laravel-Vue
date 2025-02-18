<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    
    public static $wrap = 'category';

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
