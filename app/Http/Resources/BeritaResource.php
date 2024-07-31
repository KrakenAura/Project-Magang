<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'image' => $this->image,
            'description' => $this->description,
            'title' => $this->title,
            'author' => $this->author,
            'category' => $this->category,
            'teaser' => $this->teaser,
            'tanggal' => $this->created_at->format('Y/m/d')
        ];
    }
}
