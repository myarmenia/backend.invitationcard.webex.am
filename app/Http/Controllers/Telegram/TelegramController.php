<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;
class TelegramController extends Controller
{
    public $telegram;
    public function __construct()
    {
        $this->telegram = new Api('1866939921:AAHSjUDSjOw8cH1Eq6geXhBcTkFC1FpzKMk');
    }

    public function getMe()
    {
        $response = $this->telegram->getMe();
        return $response;
    }
    public function telegram(){


        $response = $this->telegram->sendMessage([
            'chat_id' => '-4280219646',
            'text' => 'ddddd',
        ]);

        return $response;
    }
}
