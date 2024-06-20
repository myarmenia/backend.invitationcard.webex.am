<?php

namespace App\Http\Requests\API;

use App\Models\PromoCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Carbon;
class ApiFormRequest extends FormRequest
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

        $data = [
            'template_id' => 'required',
            'date' => 'required|date',
            'feedback' => 'required',
            'tariff_id' => 'required'
        ];

        if ($this->has('promo_code')) {
            $data['promo_code'] = [
                'exists:promo_codes,code',
                function ($attribute, $value, $fail) {
                    $this->ceckDate($attribute, $value, $fail);
                },

            ];
        }

        return $data;

    }

    public function ceckDate($attribute, $value, $fail) {
        $promo = PromoCode::where('code', $value)->first();

        $currentDate = Carbon::now()->startOfDay();

        if ( $promo && $currentDate->greaterThan($promo->valid_date)) {
            $fail(__('messages.expired_code'));
        }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
