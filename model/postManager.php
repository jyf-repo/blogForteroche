<?php 
require_once('dbConnect.php');
class PostManager extends DbConnect
{
    public function postsList()
{
        $db=$this->connect();
        $list=$db->query('SELECT * FROM ticket');
        return $list;
}
}