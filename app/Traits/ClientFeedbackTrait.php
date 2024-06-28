<?php
namespace App\Traits;


use App\Helpers\WhatsAppAPI;
use App\Models\Form;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

trait ClientFeedbackTrait
{
    public function sendMessage(array $data)
    {
        $token = $data['token'];

        $form = Form::where('token', $token)->first();
        $feedback = $form->feedback->feedback;
        $lang = $form->language;
        app()->setLocale($lang);
        // $feedback = '37499116665';

        $res = $data['visit'] ? __('messages.will_come') : __('messages.can_not_come');
        $guest_quantity = $data['visit'] ? __('messages.number_of_guests') . " $data[guest_quantity]" : '';

        $body = __('messages.answer') . " $res \n".
                 __('messages.guest') . " $data[guest_name] \n $guest_quantity";

        return WhatsAppAPI::sendMessage($body, $feedback);
    }


}
