<?php

namespace jyfweb\blogForteroche\model;

require_once('model/dbConnect.php');

class AdminManager extends DbConnect
{
    function verifPass($pseudo,$pass)
    {
        $db=$this->connect();
        $requete=$db->prepare('SELECT pseudo, pass FROM members WHERE pseudo=:pseudo AND pass=:pass');
        $requete->execute(array(
            'pseudo'=>$pseudo,
            'pass'=>$pass
        ));
        $verif=$requete->fetch();
        return $verif;
    }
}