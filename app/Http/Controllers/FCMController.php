<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FCMController extends Controller
{

    

    public function send(Request $request)
    {
        echo strtotime("now"), "\n";
                
        // fcm()
        // ->toTopic('allDevice')
        // ->priority('high')
        // ->timeToLive(60)
        // ->notification([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'image' => $request->image,
        // ])
        // ->send();
    }
}
