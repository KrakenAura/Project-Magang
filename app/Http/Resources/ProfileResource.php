<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'sejarah' => $this->sejarah,
            'struktur_organisasi' => $this->struktur_organisasi,
        ];
    }
}
