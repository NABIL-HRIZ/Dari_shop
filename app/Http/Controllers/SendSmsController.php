<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class SendSmsController extends Controller
{
    public function send_sms($id){
        $basic  = new \Vonage\Client\Credentials\Basic("aaf4d868", "1RveHUVVQKSbAEvI");
        $client = new \Vonage\Client($basic);
 
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("212609153426", 'Dari Shop ', 'Thank You For Your Order , Nabil Hariz')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            Alert::success('congras','The message was sent successfully');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
