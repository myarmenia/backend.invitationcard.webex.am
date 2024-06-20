<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TariffsResource extends JsonResource
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
            'price' => $this->price,
            'name' => $this->translation->name,
            'desc' => $this->translation->desc,
            'info_title' => $this->translation->info_title,
            'info_text' => $this->translation->info_text,
            'info_items' => json_decode($this->translation->info_items),
        ];
    }
}
