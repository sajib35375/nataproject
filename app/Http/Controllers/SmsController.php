<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function SmsSend(){
        Nexmo::message()->send([
            'to'   => '8801515698832',
            'from' => '8801779435375',
            'text' => 'dear, Mr rifat vai, kemn asen?'
        ]);
        echo "message send successfully";
    }
}
