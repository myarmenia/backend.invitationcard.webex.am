<?php

namespace App\Http\Controllers\API\Payment;

use App\Helpers\QRGenerate;
use App\Helpers\WhatsAppAPI;
use App\Http\Controllers\Controller;
use App\Models\ClientFeedback;
use App\Models\Order;
use App\Traits\Payments\CheckPaymentStatusTrait;
use App\Traits\PromoCodeTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PromoCodePaymentResultController extends Controller
{
    use CheckPaymentStatusTrait, PromoCodeTrait;
    public function __invoke(Request $request){

        $lang = $request->header('Accept-Language') && $request->header('Accept-Language') != 'hy' ? $request->header('Accept-Language') : 'am';
        app()->setLocale($lang);

        $order_number = $request->orderId;
        $tariff_id = $request->tariff_id;
        $client_feedback = ClientFeedback::find($request->client_id);

        if($client_feedback){
            $payment_result = $this->checkStatus($order_number);

            if ($payment_result) {


                $promo_code = $this->generatePromoCode($tariff_id);
                $valid_date = Carbon::parse($promo_code->valid_date)->format('d.m.Y');

                if ($promo_code) {
                    $body_promo_code = __('messages.promo_code_info') . $promo_code->code . ' .' . __('messages.promo_code_date') . $valid_date;


                    WhatsAppAPI::sendMessage($body_promo_code, $client_feedback->feedback);

                    echo "<script type='text/javascript'>
                        window.location = 'https://invitationcard.webex.am/am?promo_code=$promo_code->code'
                    </script>";
                }

                else{

                    echo "<script type='text/javascript'>
                        window.location = 'https://invitationcard.webex.am/?event_url=error'
                    </script>";
                }

            } else {
                echo "<script type='text/javascript'>
                    window.location = 'https://invitationcard.webex.am/am/?event_url=error'
                </script>";

            }
        }

    }
}
