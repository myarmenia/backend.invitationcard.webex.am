<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\GenerateLinkTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use GenerateLinkTrait;
    public function __invoke(Request $request)
    {

        $order_number = $request->order_id;

        $result = $this->generateLink($order_number);

        if ($result) {
            $link = $result['link'];
            $link = $result['promo_code'] ? $link . "&promo_code=$result[promo_code]" : $link;

            echo "<script type='text/javascript'>
                    window.location = 'https://invitationcard.webex.am/am/?event_url=$link'
                </script>";
        }

    }
}
