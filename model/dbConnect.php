<?php

namespace jyfweb\blogForteroche\model;

class DbConnect
{
    const DB_HOST='mysql:host=localhost; dbname=forteroche';
    const DB_USER='goop';
    const DB_PASS='root';
    
    function connect()
    {
        $data = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
        return $data;
    }
}
