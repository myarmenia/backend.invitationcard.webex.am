<?php
namespace App\Traits;


use App\Helpers\QRGenerate;
use Crypt;
use App\Models\Form;
use App\Models\Image;
use App\Models\Order;
use App\Models\Section;
use App\Helpers\WhatsAppAPI;
use App\Services\FileUploadService;
use Illuminate\Support\Carbon;

trait GenerateLinkTrait
{
    use TariffsTrait, PromoCodeTrait;

    public function generateLink($order_id)
    {
        try {

            $app_fron_url = env('APP_FRONT_URL');
            $order = Order::where('order_id', $order_id)->first();
            $form = $order->form;
            $lang = $form->language ?? 'am';
            $template_route = $form->template_route;
            $link_name = $form->invitation_name;
            $feedback = $form->feedback->feedback;
            $promo_code = false;
            $token = $form->token;

            $tariff_id = $order->form->tariff_id;
            $tariff_type = $this->getTariff($tariff_id)->type;

            $link = "$app_fron_url$lang$template_route?$link_name&token=$token";

            if (in_array($tariff_type, ['standart', 'premium'])) {
                $promo_code = $this->generatePromoCode($tariff_id);
                $valid_date = Carbon::parse($promo_code->valid_date)->format('d.m.Y');

                if($promo_code){
                    $body_promo_code =  __('messages.promo_code_info') . $promo_code->code . ' .' . __('messages.promo_code_date') . $valid_date;
                    WhatsAppAPI::sendMessage($body_promo_code, $feedback);
                }
            }

            // $link = "$app_fron_url$lang$template_route?$link_name&token=$token";

            $form->update(['link' => $link]);

            $body_link =  __('messages.invitation_card_text') . $link;

            $qr_code = QRGenerate::getQR($link);

            WhatsAppAPI::sendImage($qr_code, $feedback);
            WhatsAppAPI::sendMessage($body_link, $feedback);

            return [
                    'link' => $link,
                    'promo_code' => $promo_code ? $promo_code->code : false
                ];

        } catch (\Throwable $th) {
            return false;

        }

    }


    public function autoGenerateLink($form)
    {

        try {

            $app_fron_url = env('APP_FRONT_URL');
            $lang = $form->language ?? 'am';
            $template_route = $form->template_route;
            $link_name = $form->invitation_name;
            $feedback = $form->feedback->feedback;

            // $token = $form->id * 2024;
            $token = $form->token;

            $link = "$app_fron_url$lang$template_route?$link_name&p_token=$form->promo_code&token=$token";

            $form->update(['link' => $link]);

            $body_link = __('messages.invitation_card_text') . $link;
            
            $qr_code = QRGenerate::getQR($link);

            WhatsAppAPI::sendImage($qr_code, $feedback);
            WhatsAppAPI::sendMessage($body_link, $feedback);

            return $link;

        } catch (\Throwable $th) {
           return false;
        }


    }


}
