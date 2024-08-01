<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibraryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'judul' => $this->judul,
            'image' => $this->image,
            'deskripsi' => $this->deskripsi,
            'link' => $this->link,
        ];
    }
}
