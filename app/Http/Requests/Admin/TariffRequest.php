<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TariffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "price" => "required",
            "month" => "required",
            "translations.*.name" => "required",
            "translations.*.desc" => "required",
            "translations.*.info_title" => "required",
            "translations.*.info_text" => "required",
            "translations.*.info_items.*" => "required"

        ];
    }
}
