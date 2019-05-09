<?php
require_once('model/postManager.php');

function listPosts()
{
    $postManager= new PostManager;
    $listPosts= $postManager->postsList();
    require('view/indexView.php');
}