<?php

/**
 * Created by PhpStorm.
 * User: cuong
 * Date: 10/12/16
 * Time: 7:30 PM
 */

class connect
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