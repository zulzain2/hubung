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

    public static function notificationSMS($mobile_no, $content)
    {

        $raw_mobile_no = $mobile_no;

        /* regex for validating the length and the contact number is a number
            it must be a number and must be between 8 to 12 inclusive */
        $passedRegex = preg_match('/\d{8,13}/', $raw_mobile_no);
        if (!$raw_mobile_no || !$passedRegex)
            return '{"status":1,"error":"Mobile number invalid"}';

        // Check if country code is already included in the mobile no
        if ($raw_mobile_no[0] != 6)
            $raw_mobile_no = "6$raw_mobile_no"; // if not, append

    
            // esms API
            $ESMS_USERNAME     = 'magicxutm';
            $ESMS_PASSWORD     = 'magicX2020';

            $URL = 'https://api.esms.com.my/sms/send';

            $data = array(
                'user'	=> $ESMS_USERNAME,
                'pass'	=> $ESMS_PASSWORD,
                'to'	=> $raw_mobile_no,
                'msg'	=> "RM0.00 Communication: $content"
            );

            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded; charset=utf-8",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );

            $context  = stream_context_create($options);
            $result = file_get_contents($URL, false, $context);


            if ($result === FALSE) {
                $responseResult = '{"status":1,"error":"unknown"}';
            }

            $responseResult = $result;
       
		// save this action to log
		// $add = New SmsLog;
		// $add->id 			= Uuid::uuid4()->getHex();
		// $add->mobile_number = $mobile_no;
		// $add->sms_config 	= $smsConfig['ACTIVE'];
		// $add->content 		= "RM0.00 ".$content;
		// $add->response 		= $responseResult;
		// $add->save();

		return $responseResult;     
  
    }

}
