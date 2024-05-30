<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function __invoke(){

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot7252935294:AAG4fXI4fol8b255PNrZFZD6Dktz4-2-bk0/messages');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Ignore SSL certificate verification
        // $response = curl_exec($ch);
        // curl_close($ch);


        $response = Telegram::bot('mybot')->getMe();
        dd($response);
    }
}
