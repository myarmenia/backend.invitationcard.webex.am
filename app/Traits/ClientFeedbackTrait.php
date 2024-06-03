<?php
namespace App\Traits;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

trait ClientFeedbackTrait
{
    public function sendMessage(array $data)
    {
        $whatsapp_id = env('WHATSAPP_ID');
        $token = $data['token'];
        // $feedback = Order::where('token', $token)->first()->feedback;
        $feedback = '37499116665';
        $client = new Client(['verify' => false]);
        $result_data = false;

        $response = $client->post("https://wappi.pro/api/sync/message/send?profile_id=$whatsapp_id", [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => env('WHATSAPP_TOKEN')
            ],
            'body' => json_encode([
                'body' => 'Тестовое сообщение 555',
                'recipient' => $feedback,
            ])
        ]);
        // $response = Http::withOptions(['verify' => false])->asForm()->post(
        //     "https://wappi.pro/api/sync/message/send?profile_id=$whatsapp_id",
        //     [
        //         'body' => 'Тестовое сообщение 555',
        //         'recipient' => $feedback,


        //     ]
        // );

        if ($response->getStatusCode() == 200) { // 200 OK

                $response_d = $response->getBody()->getContents();
                $response_data = json_decode($response_d);
                if($response_data->status == 'done'){
                    return true;
                }
                return false;
         
        }
    }


}
