<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
            "id" => $this->id,
            "section_name" => $this->section_name,
            "section_number" => $this->section_number,
            "name_1" => $this->name_1 ?? null,
            "name_2" => $this->name_2 ?? null,
            "full_name" => $this->full_name ?? null,
            "text" => $this->text,
            "time" => Carbon::parse($this->time)->format('H:i'),
            "address" => $this->address,
            "address_link" => $this->address_link,
            "location_name" => $this->location_name ?? null,
            "images" => ImagesResourse::collection($this->images),
            "json_field" => $this->json_field ? json_decode($this->json_field) : null

        ];
    }
}
