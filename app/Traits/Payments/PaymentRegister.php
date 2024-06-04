<?php
namespace App\Traits\Payments;
use App\Models\Payment;
use App\Models\PurchasedItem;
use App\Models\PurchaseUnitedTickets;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use stdClass;


trait PaymentRegister
{
    public function register($data)
    {

        $amount = 10;

        $response = Http::withOptions(['verify' => false])->asForm()->post(
            // 'https://ipaytest.arca.am:8445/payment/rest/register.do',
                'https://ipay.arca.am/payment/rest/register.do',
                [
                    // 'userName'=>'gorcka_api',
                    // 'password' => 'Nokia6300',
                    // 'userName' => '34558260_api',
                    // 'password' => 'Ah0545139',
                    'userName' => env('ACBA_USER_NAME'),
                    'password' => env('ACBA_PASSWORD'),
                    'amount' => $amount * 100,
                    'currency' => '051',
                    'language' => 'en',
                    'orderNumber' => 'k_'.$data->id,
                    'returnUrl' => url('') . '/api/payment-result'

                ]
            );


            if ($response->getStatusCode() == 200) { // 200 OK

                $response_d = $response->getBody()->getContents();
                $response_data = json_decode($response_d);

                if($response_data->errorCode == 0){

                    $order_id = $response_data->orderId;
                    $order = [
                        'form_id' => $data->id,
                        'form_type' => $data->template->category->name,
                        'order_id' => $order_id,
                        'amount' => $amount,
                        'language' => $data->language

                    ];


                    $this->addOrder($order);

                    return $response_data->formUrl;
                }
                else{
                    return 'error_payment';
                }

            }

    }




}
