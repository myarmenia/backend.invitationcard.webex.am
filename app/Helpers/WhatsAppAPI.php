<?php

namespace App\Helpers\Sendpulse;
use GuzzleHttp\Client;


class WhatsAppAPI
{

    public static function sendMessage(string $body, string $feedback)
    {
        $whatsapp_id = env('WHATSAPP_ID');

        $client = new Client(['verify' => false]);

        $result_data = false;
        $data = json_encode([
                'body' => $body,
                'recipient' => $feedback,
            ]);

        $response = $client->post("https://wappi.pro/api/sync/message/send?profile_id=$whatsapp_id", [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => env('WHATSAPP_TOKEN')
            ],
            'body' => $data
        ]);


        if ($response->getStatusCode() == 200) { // 200 OK

            $response_d = $response->getBody()->getContents();
            $response_data = json_decode($response_d);
            if ($response_data->status == 'done') {
                return true;
            }
            
            return false;

        }
    }


}
