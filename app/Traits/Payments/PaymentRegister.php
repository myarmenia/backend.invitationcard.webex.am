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

        $amount = $this->getTariff($data->tariff_id)->price;

        $lang = $data->language == 'am' ? 'hy' : $data->language;

        $response = Http::withOptions(['verify' => false])->asForm()->post(
            // 'https://ipaytest.arca.am:8445/payment/rest/register.do',
                'https://ipay.arca.am/payment/rest/register.do',
                [

                    'userName' => env('ACBA_USER_NAME'),
                    'password' => env('ACBA_PASSWORD'),
                    // 'amount' => $amount * 100,
                    'amount' => 10 * 100,
                    'currency' => '051',
                    'language' => $lang,
                    'orderNumber' => $data->buy_tariff ? 'client_feedback_ld_' . $data->id : 'lg_' . $data->id,
                    'returnUrl' => $data->buy_tariff ? url('') . "/api/promo-code-payment-result?tariff_id=$data->tariff_id&client_id=$data->id" : url('') . '/api/payment-result'

                ]
            );


            if ($response->getStatusCode() == 200) { // 200 OK

                $response_d = $response->getBody()->getContents();
                $response_data = json_decode($response_d);

                if($response_data->errorCode == 0){

                    $order_id = $response_data->orderId;
                    $order = [
                        'form_id' => $data->buy_tariff ? null : $data->id,
                        'form_type' => $data->buy_tariff ? null : $data->template->category->key,
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
