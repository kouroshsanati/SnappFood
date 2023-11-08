<?php

namespace App\Http\Resources;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $restaurant = Restaurant::query()->find(1);
        return [
            'id' => $this->id,
            'title' => $this->name,
            'type' => $this->restaurantCategory->name,
            'address' =>[
                'address'=>$this->address,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ] ,
            'is_open'=>$this->is_open,
            'score'=>$this->score
        ];
    }
}
