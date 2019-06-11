<?php

require_once('model/postManager.php');
require_once('model/adminManager.php');
require_once('model/commentManager.php');

function numberOfPosts()
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $numberOfPosts= $postManager->countPosts();
}

function listPosts()
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $listPosts= $postManager->postsList();
    numberOfPosts();
    require('view/frontEnd/postView.php');
}

function onePost($postId)
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $getPost=$postManager->postGet($postId);
    listComments($postId);
}

function listComments($postId)
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $getPost=$postManager->postGet($postId);
    
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $getComments=$commentManager->commentsGet($postId);
    
    require('view/frontEnd/commentView.php');
}

function addNewComment($postId, $author, $comment)
{
    
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $insertComment=$commentManager->commentInsert($postId, $author,$comment);
    listComments($postId);
}

function newAlertComment($commentId, $postId)
{
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $alertComment=$commentManager->commentAlert($commentId);
    echo '
    <div class="alert alert-primary" role="alert">
    Votre alerte a bien été envoyée.
    </div>';
    listComments($postId);
}