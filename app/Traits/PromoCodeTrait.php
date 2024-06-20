<?php
namespace App\Traits;

use App\Models\PromoCode;
use App\Models\Tariff;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

trait PromoCodeTrait
{

    public function generatePromoCode($tariff_id)
    {
        $now = Carbon::now();

        $tarif = Tariff::find($tariff_id);
        $valid_date = $now->addMonths($tarif->month);

        do {
            $code = Str::random(8);
        } while (PromoCode::where('code', $code)->exists());

        $generated_code = PromoCode::create([
            'code' => $code,
            'tariff_id' => $tariff_id,
            'valid_date' => $valid_date
        ]);

        if ($generated_code) {
            return $generated_code;

        }

        return false;

    }

    public function checkCode($code){
        $promo = PromoCode::where('code', $code)->first();

        if ($promo ) {
            return __('messages.valid_code') . Carbon::parse($promo->valid_date)->format('d.m.Y');
        }
        else{
            return __('messages.code_not_found');
        }
    }


}
