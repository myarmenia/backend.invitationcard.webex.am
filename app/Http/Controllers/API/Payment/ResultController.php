<?php

namespace App\Http\Controllers\API\Payment;

use App\Http\Controllers\Controller;
use App\Traits\GenerateLinkTrait;
use App\Traits\Payments\CheckPaymentStatusTrait;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    use CheckPaymentStatusTrait, GenerateLinkTrait;
    public function __invoke(Request $request)
    {

        $order_number = $request->orderId;
        $payment_result = $this->checkStatus($order_number);

        if ($payment_result) {

            if($payment_result['error_code'] == 0){

                $link = $this->generateLink($order_number);



                echo "<script type='text/javascript'>
                    window.location = 'https://invitationcard.webex.am/am/wedding1?event_url=$link'
                </script>";
            }
            else{

                echo "<script type='text/javascript'>
                    window.location = 'https://invitationcard.webex.am/am/wedding1?error'
                </script>";
            }


        }else{
            echo "<script type='text/javascript'>
                    window.location = 'https://invitationcard.webex.am/am/wedding1?errort'
                </script>";

        }

    }
}