<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 10/12/2016
 * Time: 3:20 PM
 */

namespace App\Services;


class ConnectService
{
    public function mongodb(){
        $database = config('database.connections.mongodb.database');
        $host = config('database.connections.mongodb.host');
        $port = config('database.connections.mongodb.port');
        $connect = new \MongoClient('mongodb://'.$host.':'.$port);
        $db = $connect->$database;
        return $db;
    }
}