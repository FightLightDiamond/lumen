<?php
/**
 * Created by PhpStorm.
 * User: cuong
 * Date: 12/14/16
 * Time: 9:53 PM
 */

namespace App\Services;


class Curl
{
    private $domain = 'http://localhost:3000/';
    private $timeout = 10;

    public function getData($path)
    {
        $url =  $this->domain.$path;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        $data = curl_exec($ch);
        $this->logError($ch);
        curl_close($ch);
        return $data;
    }

    private function logError($ch){
        $a = curl_errno($ch);
        curl_strerror ($a );
    }

}