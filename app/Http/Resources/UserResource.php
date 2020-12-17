<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            // 'user_id' => $this->id,
            // 'user_firstname' => $this->firstname,
            // 'user_lastname' => $this->lastname,
            // 'user_email' => $this->email,
            // 'user_password' => $this->password,
            // 'user_disliked_post' => $this->disliked_post,
            // 'user_favourites_post' => $this->favourites_post,
            // 'user_favourites_category' => $this->favourites_category,
            // 'user_preferences' => $this->preferences,
            // 'user_type' => $this->user_type,
            'author_id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'author_email' => $this->email,
            'avatar' => $this->profile_photo_path
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
