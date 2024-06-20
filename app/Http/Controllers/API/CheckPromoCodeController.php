<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckPromoCodRequest;
use App\Traits\PromoCodeTrait;
use Illuminate\Http\Request;

class CheckPromoCodeController extends BaseController
{
    use PromoCodeTrait;
    public function __invoke(CheckPromoCodRequest $request){
         $result = $this->checkCode($request->promo_code);

         if($result){
            return $this->sendResponse([], $result);
         }

        return $this->sendError(__('messages.system_error'));

    }
}
