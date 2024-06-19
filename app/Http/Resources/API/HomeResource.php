<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $templates = $request->category_id != null ? templatesFilter($request->category_id) : templates();

        return [
            "categories" =>  CategoriesResource::collection(categories()),
            "templates" => TemplatesResource::collection($templates)
        ];
    }
}
