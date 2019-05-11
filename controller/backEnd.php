<?php

require_once('model/postManager.php');

function listPosts()
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $listPosts= $postManager->postsList();
    require('view/backEnd/indexView.php');
}

function addNewPost($title, $content)
{
    
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $insertPost=$postManager->postInsert($title,$content);
    header('location: index.php');/*header pour eviter de recharger les données* en rechargeant la page*/
}

function deleteOldPost($postId)
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $deletePost=$postManager->postDelete($postId);
    listPosts();
}

function showPostToModify($postId)
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $getPost=$postManager->postGet($postId);
    listPosts();
}

function updateOldPost($postId,$title,$content)
{
    $postManager=new \jyfweb\blogForteroche\model\PostManager();
    $modifyPost=$postManager->postModify($postId,$title,$content);
    header('location: index.php');/*header pour eviter de recharger les données* en rechargeant la page*/
}