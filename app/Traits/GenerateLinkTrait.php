<?php
namespace App\Traits;


use App\Helpers\WhatsAppAPI;
use App\Models\Form;
use App\Models\Image;
use App\Models\Order;
use App\Models\Section;
use App\Services\FileUploadService;

trait GenerateLinkTrait
{

    public function generateLink($order_id)
    {
        $app_fron_url = env('APP_FRONT_URL');
        $order = Order::where('order_id', $order_id)->first();
        $lang = $order->form->lang;
        $template_route = $order->form->template_route;
        $link_name = $order->form->invitation_name;
        $feedback = $order->form->feedback->feedback;

        $link = "$app_fron_url$lang$template_route?$link_name&token=$order_id";

        $order->update(['link' => $link]);

        $body = "🎉 Ձեր հրավիրատոմսը հաջողությաամբ ստեղծված է։ \n Հրավիրատոմսը կարող եք տեսնել հետևյալ հղմամբ։ \n $link 🎉";

        WhatsAppAPI::sendMessage($body, $feedback);

        return $link;

    }


}
