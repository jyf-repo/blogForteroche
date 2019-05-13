<?php

namespace jyfweb\blogForteroche\model;

require_once('model/dbConnect.php');

class CommentManager extends DbConnect
{
    public function commentsGet($postId)
    {
        $db=$this->connect();
        $request=$db->prepare('SELECT id, author, id_ticket, comment, date_comment, alert, visibility FROM comments WHERE id_ticket=?');
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
}