<?php

namespace App\Http\Resources;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'restaurant' => [
                'title' => $this->restaurant->name,
                'image' => $this->restaurant->image,
            ],
            'foods' => CartFoodResource::collection($this->cartFoods),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
