<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kreait\Firebase\Messaging\CloudMessage;

class Notification extends Model
{
    use HasFactory;

    public static function notificationFCM($token , $title, $body, $icon , $click_url, $id_module = null , $module = null)
    {

        $deviceToken = $token;

        $message = CloudMessage::fromArray([
            'token' => $deviceToken,
            'notification' => [
                "title" => $title,
                "body" => $body,
                "icon" => ''
            ], // optional
            'data' => [
                "click_action"  => 'FLUTTER_NOTIFICATION_CLICK',
                "id_module"  => $id_module,
                "module"  => $module,
                "route" => $click_url,
            ], // optional
        ]);

        $messaging = app('firebase.messaging');

        $messaging->send($message);        
  
    }

}
