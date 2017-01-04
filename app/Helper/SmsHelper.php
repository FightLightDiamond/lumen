<?php

namespace App\Helper;

use Log;
use nusoap_client;

class SmsHelper {

    public static function sendAlert($content)
    {
        if(env('SMS_ALERT_ENABLE', false)){
            $phone_no = env('SMS_ALERT_MSISDN');
            $timeout = env('SMS_TIMEOUT');
            $client = new nusoap_client(env('SMS_URL'), 'WSDL', false, false, false, false, $timeout, $timeout);
            $error = $client->getError();
            if ($error) {
                Log::error('sendSms|'.env('SMS_URL')."|".$phone_no."|".$content."|".$error);
            }
            //authenticate to the service:
            $client->setCredentials(env('SMS_USERNAME'), env('SMS_PASSWORD'));
			$serviceID = 'KEENGNAGIOS';
            $param = array(
                'User' => env('SMS_SERVICE_USERNAME'),
                'Pass' => env('SMS_SERVICE_PASSWORD'),
                'CPCode' => '223',
                'RequestID' => '4',
                'UserID' => $phone_no,
                'ReceiveID' => $phone_no,
                'ServiceID' => $serviceID,
                'CommandCode' => 'KEENG',
                'ContentType' => 'f',
                'Info' => $content
            );

            $result = $client->call('InsertMT', array('parameters' => $param), '', '', false, true);
            //check if there were any call errors, and if so stop execution with some error messages:
            $error = $client->getError();
            if ($error) {
                Log::error('sendSms|'.env('SMS_URL')."|".$phone_no."|".$content."|".$error);
            }else {
                Log::info('sendSms|'.env('SMS_URL')."|".$phone_no."|".$content."|".implode($result)."|success");
            }
        }
    }
}
