<?php
namespace App\Traits\Payments;

use App\Models\Order;
use App\Models\Payment;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

trait CheckPaymentStatusTrait
{
    public function checkStatus(string $order_id)
    {

        $result_data = false;
        $order = Order::where('order_id', $order_id)->first();

        $response = Http::withOptions(['verify' => false])->asForm()->get(
            'https://ipay.arca.am/payment/rest/getOrderStatusExtended.do',

            [
                'userName' => env('ACBA_USER_NAME'),
                'password' => env('ACBA_PASSWORD'),
                'orderId' => $order_id,
                'language' => 'ru'
            ]
        );

        if ($response->getStatusCode() == 200) { // 200 OK

            $response_d = $response->getBody()->getContents();
            $response_data = json_decode($response_d);

            $result = false;
            if ($response_data->errorCode == 0) {
                if ($response_data->paymentAmountInfo->paymentState == "DEPOSITED") {
                    $order->update(['status' => 1]);
                    $order->payment->update(['status' => 'confirmed']);

                    $result = true;
                }
            }

            $order->payment->update([
                'error_code' => $response_data->errorCode,
                'error_message' => $response_data->errorMessage
            ]);

            return $result;

        }

        return false;
    }



}
