<?php
session_start();
require_once('model/postManager.php');
require_once('model/adminManager.php');
require_once('model/commentManager.php');

function showFormConnect()
{
    require('view/backend/connexion.php');
}

function connectAdmin($pseudo, $pass)
{
    $adminManager= new \jyfweb\blogForteroche\model\AdminManager();
    $passVerif=$adminManager->verifPass($pseudo,$pass);
    if ($passVerif==true)
        {      
            $_SESSION['pseudo']=$_POST['pseudo'];
            listPosts();
        } 
        else
        {
            echo 'Mauvais mot de passe ou mauvais pseudo';
            require('view/backend/connexion.php');
        }
}

function deconnectAdmin()
{
    session_destroy();
    echo 'Vous etes déconnecté';
    require('view/backend/connexion.php');
}

function listPosts()
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $listPosts= $postManager->postsList();
    require('view/backEnd/adminPostView.php');
}

function addNewPost($title, $content)
{
    
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $insertPost=$postManager->postInsert($title,$content);
    listPosts();/*header pour eviter de recharger les données* en rechargeant la page*/
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
    listPosts();/*header pour eviter de recharger les données* en rechargeant la page*/
}

function listComments($postId)
{
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $getComments=$commentManager->commentsGet($postId);
    require('view/backend/adminCommentView.php');
}