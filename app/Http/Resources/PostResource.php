<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       //SovathChean
        return [
          'id' => $this->id,
          'title' => $this->name,
          'category' => new CategoryResource($this->category),
          'author' => $this->user->name,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at
        ];
    }
}
