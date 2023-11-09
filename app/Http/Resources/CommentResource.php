<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'author' => [
                'name' => $this->cart->user->name,
            ],
            'foods' => [
                $this->cart->foods->map(function ($food) {
                    return $food->name;
                })
            ],
            'created_at' => $this->created_at,
            'score' => $this->score,
            'content' => $this->content,
        ];
    }
}
