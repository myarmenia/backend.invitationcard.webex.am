<?php

namespace App\Http\Controllers\API\Payment;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\GenerateLinkTrait;
use App\Http\Controllers\Controller;
use App\Traits\Payments\CheckPaymentStatusTrait;

class ResultController extends Controller
{
    use CheckPaymentStatusTrait, GenerateLinkTrait;
    public function __invoke(Request $request)
    {

        $order_number = $request->orderId;
        $order = Order::where('order_id', $order_number)->first();
        $template_route	 = $order->form->template->route;

        $payment_result = $this->checkStatus($order_number);

        if ($payment_result) {

            if($payment_result['error_code'] == 0){

                $link = $this->generateLink($order_number);

                if($link){
                    echo "<script type='text/javascript'>
                        window.location = 'https://invitationcard.webex.am/am$template_route?event_url=$link'
                    </script>";
                }

                echo "<script type='text/javascript'>
                    window.location = 'https://invitationcard.webex.am/am$template_route?error1'
                </script>";

            }
            else{

                echo "<script type='text/javascript'>
                    window.location = 'https://invitationcard.webex.am/am$template_route?error2'
                </script>";
            }


        }else{
            echo "<script type='text/javascript'>
                    window.location = 'https://invitationcard.webex.am/am$template_route?errort3'
                </script>";

        }

    }
}
