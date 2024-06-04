<?php
namespace App\Traits;

use App\Helpers\Sendpulse\WhatsAppAPI;
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


        $body = 'text text text';

        return WhatsAppAPI::sendMessage($body, $feedback);
    }


}
