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

        $response = Http::withOptions(['verify' => false])->asForm()->post(
            'https://ipay.arca.am/payment/rest/deposit.do',

            [
                // 'userName' => 'gorcka_api',
                // 'password' => 'Nokia6300',
                // 'userName' => '34558260_api',
                // 'password' => 'Ah0545139',
                'userName' => env('ACBA_USER_NAME'),
                'password' => env('ACBA_PASSWORD'),
                'orderId' => $order_id,
                'amount' => $order->amount * 100,
                'currency' => '051',
                'language' => 'ru',

            ]
        );

        if ($response->getStatusCode() == 200) { // 200 OK

            $response_d = $response->getBody()->getContents();
            $response_data = json_decode($response_d);

            $response = '';
            if ($response_data->errorCode == 0) {


                $order->update(['status' => 1]);
                $order->payment->update(['status' => 'confirmed']);

            } else {

                // $message = isset($response_data->message) ? $response_data->message : (isset($response_data->errors) ? $response_data->errors->payment : null);

                // $result_data = ['payment_message' => $message];

                $order->payment->update([
                    'error_code' => $response_data->errorCode,
                    'error_message' => $response_data->errorMessage
                ]);

            }

            return [
                'error_code' => $response_data->errorCode,
                'error_message' => $response_data->errorMessage ?? null
            ];

        }

      return false;
  }



}
