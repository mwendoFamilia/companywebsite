<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'image_id' => $this->id,
            'image_description' => $this->description,
            'image_url' => $this->url,
            'post_id' => $this->post_id,
            'is_featured' => $this->featured,
           
        ];
    }
    public function with($request)
    {
        return [
            'version' => "1.0.0",
            'author_url' => "https://mwendofamilia.com"
        ];
    }
}
