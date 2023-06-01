<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
                'id' => $this->id,
                'title' => $this->title,
                'alias' => $this->alias,
                'desc' => $this->desc,
                'image_id' => $this->image_id,
                'meta_key' => $this->meta_key,
                'meta_title' => $this->meta_title,
                'meta_desc' => $this->meta_desc,
                'status' => $this->status,
                'updated_at' => $this->updated_at,
                'created_at' => $this->created_at,
                'category_id' => $this->category_id,
        ];
    }
}












