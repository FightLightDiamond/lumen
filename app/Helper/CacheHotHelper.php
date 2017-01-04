<?php

/**
 * Created by IntelliJ IDEA.
 * User: huynq28
 * Date: 9/23/2016
 * Time: 1:42 PM
 */

namespace App\Helper;

class CacheHotHelper
{
    const SONG_TYPE = 1;
    const VIDEO_TYPE = 2;

    public static function getSongType(){
        return SONG_TYPE;
    }

    public static function getVideoType(){
        return VIDEO_TYPE;
    }

    public static function setHot($id, $type) {
        $id = $id;
        $answer = null;
        $user = env('CACHE_HOT_USER');
        $pass = env('CACHE_HOT_PASS');
        $days = '50';
        $action = '2';
        try {
            //instantiate the NuSOAP class and define the web service URL:
            $client = new nusoap_client(env('CACHE_HOT_URL').'/CacheFileManager/Service.asmx?wsdl', 'WSDL');

            //check if there were any instantiation errors, and if so stop execution with an error message:
            $error = $client->getError();
            if ($error) {
                Log::error("set hot fail|".$id."|".$type."|".json_encode($error));
            }

            $arguments = array(
                'user' => $user,
                'pass' => $pass,
                'id' => $id,
                'type' => $type,
                'days' => $days,
                'action' => $action,
            );
            $answer = $client->call('setCache', $arguments);
            Log::info("set hot success|".$id."|".$type."|".json_encode($answer));
        } catch (Exception $ex) {
            Log::error("set hot fail|".$id."|".$type."|".$ex->getMessage());
        }
    }
}