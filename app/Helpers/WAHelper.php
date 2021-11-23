<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class WAHelper
{
    public static function send($to, $message)
    {
        return Http::post('https://console.zenziva.net/wareguler/api/sendWA/', [
            'userkey' => '60fa891ad669',
            'passkey' => '612c1b193ed11cb91bff986d',
            'to' => $to,
            'message' => $message
        ]);
    }
}
