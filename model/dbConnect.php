<?php

namespace jyfweb\blogForteroche\model;

class DbConnect
{
    const DB_HOST='mysql:host=localhost; dbname=forteroche';
    const DB_USER='root';
    const DB_PASS='root';
    
    function connect()
    {

        try
        {
        $data = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
        return $data;
        }

        catch (Exception $e)
        {
            die('erreur ' . $e->getMessage());
        }


    }
}
