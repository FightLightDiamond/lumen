<?php

namespace App\Helper;

use SoapClient;

class MsisdnHelper
{
    public static function getMsisdn()
    {
        if (self::isViettelIp() == false) {
            if (self::isVinaPhoneChargingIp() == true) {
                return 'vina';
            } else {
                return 'unknown';
            }
        }
        $ip = self::getDeviceIp();

        if (!$ip) {
            return 'unknown';
        }
        if (preg_match('/^113\.185\./', $ip) || preg_match('/^113\.185\.31\./', $ip)) {
            return 'vina';
        } else {
            $param = array(
                'username' => env('radius_username', 'ttnd'),
                'password' => env('radius_password', 'ttnd123$%'),
                'ip' => $ip
            );
            $options = array('connect_timeout' => 1, 'timeout' => 1);

            $headerIp = '';
            $headerMsisdn = '';
            try{
                if(isset($_SERVER['HTTP_MS_IP'])){
                    $headerIp = $_SERVER['HTTP_MS_IP'];
                    $headerMsisdn = $_SERVER['HTTP_MSISDN'];

                    // return msisdn header if has
                    $content = '|' . $ip . '|' . $headerIp . '|' . $headerMsisdn . '|header';
                    LogHelper::logVaaa($content);
                    return self::checkHeaderMsisdn($headerMsisdn);
                }
            }catch (Exception $e) {
                $content = '|' . $ip . '|header not found';
                LogHelper::logVaaa($content);
            }
            try {
                $client = new SoapClient(env('radius_url', 'http://10.58.32.212:8180/RadiusGW/Radius?wsdl'), $options);

                $result = $client->__soapCall('getMSISDN', array($param));

                if (is_object($result)) {
                    $content = '|' . $ip . '|' . $result->return->desc . '|' . $headerIp . '|' . $headerMsisdn;

                    if ($result->return->code == 0) {
                        if ($headerMsisdn == $result->return->desc) {
                            $content = $content . '|ok';
                            LogHelper::logVaaa($content);
                            return self::remove084PhoneNumber($result->return->desc);
                        } else {
                            $content = $content . '|nok2';
                            LogHelper::logVaaa($content);
                            return self::remove084PhoneNumber($result->return->desc);
                        }
                    } else {
                        LogHelper::logVaaa($content . '|nok');
                        return self::checkHeaderMsisdn($headerMsisdn);
                    }
                } else {
                    $content = '|' . $ip . '|response no object|nok';
                    LogHelper::logVaaa($content);
                    return self::checkHeaderMsisdn($headerMsisdn);
                }
            } catch (Exception $e) {
                $content = '|' . $ip . '|' . $e->getCode() . ': ' . $e->getMessage() . '|nok';
                LogHelper::logVaaa($content);
                return self::checkHeaderMsisdn($headerMsisdn);
            }
        }
    }

    public static function getRealMsisdn()
    {
        if (self::isViettelIp() == false) {
            if (self::isVinaPhoneChargingIp() == true) {
                return 'vina';
            } else {
                return 'unknown';
            }
        }
        $ip = self::getDeviceIp();

        if (!$ip) {
            return 'unknown';
        }
        if (preg_match('/^113\.185\./', $ip) || preg_match('/^113\.185\.31\./', $ip)) {
            return 'vina';
        } else {
            $param = array(
                'username' => env('radius_username', 'ttnd'),
                'password' => env('radius_password', 'ttnd123$%'),
                'ip' => $ip
            );
            $options = array('connect_timeout' => 1, 'timeout' => 1);

            $headerIp = '';
            $headerMsisdn = '';
//            try{
//                $headerIp = $_SERVER['HTTP_MS_IP'];
//                $headerMsisdn = $_SERVER['HTTP_MSISDN'];
//            }catch (Exception $e) {
//                $content = '|' . $ip . '|header not found';
//                LogHelper::logVaaa($content);
//            }
            try {
                $client = new SoapClient(env('radius_url', 'http://10.58.32.212:8180/RadiusGW/Radius?wsdl'), $options);

                $result = $client->__soapCall('getMSISDN', array($param));

                if (is_object($result)) {
                    $content = '|' . $ip . '|' . $result->return->desc . '|' . $headerIp . '|' . $headerMsisdn;

                    if ($result->return->code == 0) {
                        if ($headerMsisdn == $result->return->desc) {
                            $content = $content . '|ok';
                            LogHelper::logVaaa($content);
                            return self::remove084PhoneNumber($result->return->desc);
                        } else {
                            $content = $content . '|nok2';
                            LogHelper::logVaaa($content);
                            return 'unknown';
                        }
                    } else {
                        LogHelper::logVaaa($content . '|nok');
                        return 'unknown';
                    }
                } else {
                    $content = '|' . $ip . '|response no object|nok';
                    LogHelper::logVaaa($content);
                    return 'unknown';
                }
            } catch (Exception $e) {
                $content = '|' . $ip . '|' . $e->getCode() . ': ' . $e->getMessage() . '|nok';
                LogHelper::logVaaa($content);
                return 'unknown';
            }
        }
    }

    private static function checkHeaderMsisdn($headerMsisdn){
        if($headerMsisdn != ''){
            return self::remove084PhoneNumber($headerMsisdn);
        }else{
            return 'unknown';
        }
    }

    public static function isViettelIp()
    {
        $ip = self::getDeviceIp();
        if (!$ip) {
            return false;
        }
        if (preg_match('/^27\./', $ip) || preg_match('/^10\./', $ip) || preg_match('/^171\./', $ip) || preg_match('/^125\./', $ip) || preg_match('/^100\./', $ip)) {
            return true;
        } else {
            return false;
        }
    }

    public static function isVinaPhoneChargingIp()
    {
        $ip = self::getDeviceIp();
        if (!$ip) {
            return false;
        }
        if (preg_match('/^113\.185\./', $ip) || preg_match('/^113\.185\.31\./', $ip)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Tra ve IP cua thiet bi truy cap
     * @author NamDT5
     * @created on Mar 26, 2012
     * @return string
     */
    public static function getDeviceIp()
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $mobileIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $mobileIp = $_SERVER['REMOTE_ADDR'];
        }

        if (!empty($mobileIp)) {
            $addr = explode(",", $mobileIp);
            return $addr[0];
        } else {
            return $mobileIp;
        }
    }

    public static function remove084PhoneNumber($phone_no)
    {
        if (self::strBeginWith('0', $phone_no)) {
            return substr($phone_no, 1, strlen($phone_no) - 1);
        } elseif (self::strBeginWith('84', $phone_no)) {
            return substr($phone_no, 2, strlen($phone_no) - 2);
        }
        return $phone_no;
    }

    public static function strBeginWith($needle, $haystack)
    {
        return (substr($haystack, 0, strlen($needle)) == $needle);
    }

    public static function isViettelPhoneNumber($msisdn) {
        $pattern = '/^8496\d{7}$|^0?96\d{7}$|^8497\d{7}$|^0?97\d{7}$|^8498\d{7}$|^0?98\d{7}$|^8416\d{8}$|^0?16\d{8}$|^8486\d{7}$|^0?86\d{7}$/';

        preg_match($pattern, $msisdn, $matches);
        if (count($matches) > 0)
            return true;
        return false;
    }
}
