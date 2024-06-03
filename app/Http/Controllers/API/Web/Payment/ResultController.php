<?php

namespace App\Http\Controllers\API\Web\Payment;

use App\Http\Controllers\Controller;
use App\Traits\GenerateLinkTrait;
use App\Traits\Payments\CheckPaymentStatusTrait;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    use CheckPaymentStatusTrait, GenerateLinkTrait;
    public function __invoke(Request $request)
    {

        $order_number = $request->order_number;
        $payment_result = $this->checkStatus($order_number);

        if ($payment_result) {

            if($payment_result['error_code'] == 0){

                $link = $this->generateLink($order_number);
                echo "<script type='text/javascript'>
                    window.location = 'https://event.webex.am?$link'
                </script>";
            }
            else{

                echo "<script type='text/javascript'>
                    window.location = 'https://event.webex.am?error-message=$payment_result[error_message]'
                </script>";
            }


        }else{
            echo "<script type='text/javascript'>
                    window.location = 'https://event.webex.am?error-message=urishtext'
                </script>";

        }

    }
}
