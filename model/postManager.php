<?php

namespace jyfweb\blogForteroche\model;

require_once('dbConnect.php');

class PostManager extends DbConnect
{
    public function countPosts()
    {
        $db=$this->connect();
        $countPosts=$db->query('SELECT COUNT(*) AS nbPosts FROM ticket');
        $count=$countPosts->fetch();
        return $count['nbPosts'];
    }
    
    public function postLast()
    {
        $db=$this->connect();
        $req=$db->query('SELECT MAX(id) AS top FROM ticket ');
        $last=$req->fetch();
        return $last['top'];
    }
    
    public function postShow($postId,$visibility)
    {
        $db=$this->connect();
        $resetVisibility=$db->query('UPDATE ticket SET visibility=0');/*reset visibility to 0*/
        $reset=$resetVisibility->fetch();
        $req=$db->prepare('UPDATE ticket SET visibility=:visibility WHERE id=:id ');/*then only one post visible*/
        $req->execute(array(
            'id'=>$postId,
            'visibility'=>$visibility
        ));
        return $req;
    }
    
    public function postSee()
    {
        $db=$this->connect();
        $request=$db->query('SELECT * FROM ticket WHERE visibility=1');
        $post=$request->fetch();
        return $post;
    }
    
    public function postsList()
    {
        $db=$this->connect();
        $list=$db->query('SELECT * FROM ticket ORDER BY ID DESC ');
        return $list;
    }
    
    public function inscriptReader($name,$email)
    {
        $db=$this->connect();
        $read=$db->prepare('INSERT INTO readers (name, email, date_inscription) VALUES (:name, :email, NOW())');
        $read->execute(array(
            'name'=>$name,
            'email'=>$email
        ));
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