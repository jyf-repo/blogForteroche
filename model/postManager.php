<?php

namespace jyfweb\blogForteroche\model;

require_once('dbConnect.php');

class PostManager extends DbConnect
{
    public function postsList()
{
        $db=$this->connect();
        $list=$db->query('SELECT * FROM ticket');
        return $list;
}
    public function postInsert($title, $content)
    {
        $db=$this->connect();
        $insert=$db->prepare('INSERT INTO ticket (title, content, date_creation)  VALUES (:title, :content, NOW()) ');
        $insert->execute(array(
            'title'=>$title,
            'content'=>$content
        ));
    }
}