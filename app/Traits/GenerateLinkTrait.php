<?php
namespace App\Traits;

use App\Models\Form;
use App\Models\Image;
use App\Models\Order;
use App\Models\Section;
use App\Services\FileUploadService;

trait GenerateLinkTrait
{

    public function generateLink($order_id)
    {

        $order = Order::where('order_id', $order_id)->first();
        $link_name = $order->form->invitation_name;
        // $link = "invitation_name?=$link_name&token=$order_id";
        $link = "$link_name&token=$order_id";

        $order->update(['link' => $link]);

        return $link;

    }


}
