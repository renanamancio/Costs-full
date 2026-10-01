<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'budget' => $this->budget,
            'cost' => $this->cost,
            'id' => $this->id,
            'user' => [
                'name' => $this->user->name,
                'id' => $this->user->id,
            ],
            'category' => [
                'name' => $this->category->name,
                'id' => $this->category->id,
            ],
        ];
    }
}
