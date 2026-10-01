<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'description' => $this->description,
            'cost' => $this->cost,
            'id' => $this->id,
            'project' => [
                'name' => $this->project->name,
                'id' => $this->project->id,
            ],
        ];
    }
}
