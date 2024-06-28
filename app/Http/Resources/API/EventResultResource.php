<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class EventResultResource extends JsonResource
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
            "template_id" => $this->template_id,
            "invitation_name" => $this->invitation_name,
            "lang" => $this->language,
            "date" => $this->date,
            "sound_path" => $this->sound_path,
            "logo_path" => url('') . Storage::disk('public')->url($this->logo_path),
            "sections" => SectionsResource::collection($this->sections)

        ];
    }
}
