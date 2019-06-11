<?php

namespace jyfweb\blogForteroche\model;

require_once('dbConnect.php');

class PostManager extends DbConnect
{
    public function countPosts()
    {
        $db=$this->connect();
        $countPosts=$db->query('SELECT COUNT * FROM ticket');
        return $countPosts;
    }
    
    public function postsList()
    {
        $db=$this->connect();
        $list=$db->query('SELECT * FROM ticket ORDER BY ID DESC');
        return $list;
    }
    
    public function postInsert($title, $content)
    {
        var_dump($title, $content);
        $db=$this->connect();
        $insert=$db->prepare('INSERT INTO ticket (title, content, date_creation)  VALUES (:title, :content, NOW()) ');
        $insert->execute(array(
            'title'=>$title,
            'content'=>$content
        ));
    }
    
    public function postGet($postId)
    {
        $db=$this->connect();
        $request=$db->prepare('SELECT id, title, content, date_creation, image FROM ticket WHERE id=?');
        $request->execute(array(
            $postId
        ));
        $post=$request->fetch();
        return $post;
    }
    
    public function imageNew($postId, $imageName)
    {
        $db=$this->connect();
        $request=$db->prepare('UPDATE ticket SET image=:image WHERE id=:id');
        $request->execute(array(
            'id'=>$postId,
            'image'=>$imageName
        ));
    }
    
    public function postDelete($postId)
    {
        $db=$this->connect();
        $delete=$db->prepare('DELETE FROM ticket WHERE id=?');
        $delete->execute(array(
        $postId
        ));
    }
    
    public function postModify($postId,$title,$content)
    {
        $db=$this->connect();
        $modify=$db->prepare('UPDATE ticket SET title=:title, content=:content, date_creation= NOW() WHERE id=:id');
        $modify->execute(array(
            'id'=>$postId,
            'title'=>$title,
            'content'=>$content
        ));
    }
}