<?php

namespace jyfweb\blogForteroche\model;

require_once('model/dbConnect.php');

class CommentManager extends DbConnect
{
    public function commentsGet($postId)
    {
        $db=$this->connect();
        $request=$db->prepare('SELECT * FROM comments WHERE id_ticket=?');
        $request->execute(array(
            $postId
        ));
        return $request;
    }
    
    public function commentDelete($commentId)
    {
        $db=$this->connect();
        $delete=$db->prepare('DELETE FROM comments WHERE id=?');
        $delete->execute(array(
        $commentId
        ));
    }
    
    public function commentsDelete($postId)
    {
        $db=$this->connect();
        $delete=$db->prepare('DELETE FROM comments WHERE id_ticket=?');
        $delete->execute(array(
        $postId
        ));
    }
    
    public function commentShow($commentId)
    {
        $db=$this->connect();
        $resetVisibility=$db->query('UPDATE comments SET first_page=0');/*reset visibility to 0*/
        $reset=$resetVisibility->fetch();
        $req=$db->prepare('UPDATE comments SET first_page=1 WHERE id=:id ');/*then only one post visible*/
        $req->execute(array(
            'id'=>$commentId,
        ));
        return $req;
    }
    
    public function commentSee()
    {
        $db=$this->connect();
        $request=$db->query('SELECT * FROM comments WHERE first_page=1');
        $comment=$request->fetch();
        return $comment;
    }
    
    public function commentActivate($visibility,$commentId)
    {
        $db=$this->connect();
        $activate=$db->prepare('UPDATE comments SET visibility=:visibility WHERE id=:id');
        $activate->execute(array(
        'id'=>$commentId,
        'visibility'=>$visibility   
        ));
    }
    
    public function commentInsert($postId, $author, $comment)
    {
        $db=$this->connect();
        $insert=$db->prepare('INSERT INTO comments (author, id_ticket, comment, date_comment) VALUES (:author, :id_ticket, :comment, NOW())');
        $insert->execute(array(
            'author'=>$author,
            'id_ticket'=>$postId,
            'comment'=>$comment
        ));
    }
    
    public function commentAlert($commentId)
    {
        $db=$this->connect();
        $req=$db->prepare('UPDATE comments SET alert=:alert WHERE id=:id ');
        $req->execute(array(
            'id'=>$commentId,
            'alert'=>1
        ));
        return $req;
    }
}