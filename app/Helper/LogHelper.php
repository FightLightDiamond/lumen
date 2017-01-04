<?php

namespace App\Helper;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LogHelper
{
    public static function logVaaa($info)
    {
        $logger = new Logger('vaaa');
        $logger->pushHandler(new StreamHandler(storage_path('logs/vaaa.log'), Logger::INFO));
        $logger->addInfo($info);
    }

    public static function logCrbt($info)
    {
        $logger = new Logger('crbt');
        $logger->pushHandler(new StreamHandler(storage_path('logs/crbt.log'), Logger::INFO));
        $logger->addInfo($info);
    }

    public static function logCalloutError($error)
    {
        $logger = new Logger('3rd');
        $logger->pushHandler(new StreamHandler(storage_path('logs/3rd.log'), Logger::ERROR));
        $logger->addInfo($error);
    }

    public static function logUserInfo($info)
    {
        $logger = new Logger('user');
        $logger->pushHandler(new StreamHandler(storage_path('logs/user-info.log'), Logger::INFO));
        $logger->addInfo($info);
    }

    public static function log4dev($info)
    {
        $logger = new Logger('dev');
        $logger->pushHandler(new StreamHandler(storage_path('logs/dev.log'), Logger::INFO));
        $logger->addInfo($info);
    }

    public static function logIframe($info)
    {
        $logger = new Logger('iframe');
        $logger->pushHandler(new StreamHandler(storage_path('logs/iframe.log'), Logger::INFO));
        $logger->addInfo($info);
    }
}
