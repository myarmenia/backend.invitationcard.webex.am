<?php
namespace App\Helpers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRGenerate
{


    public static function getQR(string $link)
    {

        try {

            $from = [222, 0, 255];
            $to = [0, 0, 255];

            $data = QrCode::size(200)
                ->style('dot')
                // ->eye('circle')
                ->eye('square')

                ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
                ->margin(1)
                ->format('png')
                ->generate($link);

            $base64 = base64_encode($data);

            return $base64;


        } catch (\Throwable $th) {
            return false;

        }
    }
}
