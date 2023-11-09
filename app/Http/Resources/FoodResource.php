<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
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
            'name'=>$this->name,
            'price' => $this->price,
            'off' => [
                'label' => $this->discount,
                'factor' => (100 - $this->discount) / 100,
            ],
            'raw_materials' => $this->materials,
            'image' => $this->image,
            'total_price'=>$this->price_total,
        ];
    }
}
