<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BuyTariffRequest;
use App\Models\ClientFeedback;
use App\Traits\Payments\OrderTrait;
use App\Traits\Payments\PaymentRegister;
use App\Traits\Payments\PaymentTrait;
use App\Traits\TariffsTrait;
use Illuminate\Http\Request;

class BuyTariffController extends BaseController
{
    use PaymentRegister, TariffsTrait, OrderTrait, PaymentTrait;
    // public function __invoke(BuyTariffRequest $request){
    public function __invoke(Request $request)
    {

dd($request->all());
        $lang = $request->header('Accept-Language') ?? 'am';

        $client_feedback = ClientFeedback::create([
            'type' => $request->type ?? 'whatsapp',
            'feedback' => $request->feedback
        ]);

        $client_feedback['language'] = $lang;
        $client_feedback['buy_tariff'] = true;
        $client_feedback['tariff_id'] = $request->tariff_id;

        $redirect_url = $this->register($client_feedback);

        if ($redirect_url == 'error_payment') {
            return $this->sendError(__('messages.error_payment'));
        }

        $responce['redirect_url'] = $redirect_url;

        return $this->sendResponse($responce, 'success');
    }
}
