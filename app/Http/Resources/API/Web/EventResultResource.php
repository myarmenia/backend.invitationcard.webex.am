<?php

namespace App\Http\Resources\API\Web;

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
            "lang" => "am",
            "date" => $this->date,
            "sound_path" => $this->sound_path,
            "logo_path" => Storage::url($this->logo_path),
            "sections" => SectionsResource::collection($this->sections)

        ];
    }
}
