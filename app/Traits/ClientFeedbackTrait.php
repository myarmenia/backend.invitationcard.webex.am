<?php
namespace App\Traits;


use App\Helpers\WhatsAppAPI;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

trait ClientFeedbackTrait
{
    public function sendMessage(array $data)
    {
        $token = $data['token'];
        // $feedback = Order::where('token', $token)->first()->feedback;
        $feedback = '37499116665';

        $res = $data['visit'] ? 'կգանք' : 'չենք կարող գալ';
        $guest_quantity = $data['visit'] ? "Հյուրերի թիվը: $data[guest_quantity]" : '';

        $body = "Պատասխան։  $res \n
                 Հյուր: $data[guest_name] \n
                 🎉 $guest_quantity 🎉";

        return WhatsAppAPI::sendMessage($body, $feedback);
    }


}
