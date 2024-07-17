<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "price" => $this->price,
            "color" => $this->color,
            "variety" => $this->variety,
            "category_id" => $this->category_id,
            "category" => [
                "name" => $this->category->name
            ],
        ];
    }
}
