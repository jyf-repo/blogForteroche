<?php

namespace jyfweb\blogForteroche\model;

require_once('model/dbConnect.php');

class CommentManager extends DbConnect
{
    public function commentsGet($postId)
    {
        $db=$this->connect();
        $request=$db->prepare('SELECT author, comment, date_comment, alert, visibility FROM comments WHERE id_ticket=?');
        $request->execute(array(
            $postId
        ));
        return $request;
    }
    
}