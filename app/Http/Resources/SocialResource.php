<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama_tv' => $this->nama_tv,
            'logo' => $this->logo,
            'link_web' => $this->link_web,
            'link_insta' => $this->link_insta,
            'link_yt' => $this->link_yt,
        ];
    }
}
