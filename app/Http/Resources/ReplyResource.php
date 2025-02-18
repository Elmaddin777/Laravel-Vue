<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'reply';
    
    public function toArray($request)
    {
        return [
            'body' => $this->body,
            'question' => $this->getQuestion->title,
            'user' => $this->getUser->name,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
