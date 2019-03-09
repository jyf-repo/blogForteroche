<?php
class DbConnect
{
    function connect()
    {

        try
        {
        $data = new PDO("mysql:host=localhost; dbname=forteroche", 'root', 'root');
        return $data;
        }

        catch (Exception $e)
        {
            die('erreur ' . $e->getMessage());
        }


    }
}
