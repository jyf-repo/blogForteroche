<?php

namespace jyfweb\blogForteroche\model;

class DbConnect
{
    const DB_HOST='mysql:host=db339616-blog-imaginaire.sql-pro.online.net; dbname=db339616_blog_imaginaire';
    const DB_USER='db110304';
    const DB_PASS='Juillet-2019';
    
    function connect()
    {
        $data = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
        return $data;
    }
}
