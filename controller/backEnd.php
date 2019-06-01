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
            echo '<div class="alert alert-danger" role="alert">
            Mauvais mot de passe ou mauvais pseudo
            </div>';
            require('view/backend/connexion.php');
        }
}

function deconnectAdmin()
{
    session_destroy();
    echo '<div class="alert alert-primary" role="alert">
    Vous êtes déconnecté
    </div>';
    require('view/backend/connexion.php');
}

function listPosts()
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $listPosts= $postManager->postsList();
    require('view/backEnd/adminPostView.php');
}

function onePost($postId)
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $getPost=$postManager->postGet($postId);
    listComments($postId);
}

function addNewPost($title, $content)
{
    
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $insertPost=$postManager->postInsert($title,$content);
    listPosts();/*header pour eviter de recharger les données* en rechargeant la page*/
}

function deleteOldPost($postId)
{
    /*suppression du billet*/
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $deletePost=$postManager->postDelete($postId);
    
    /*Suppression des commentaires associés*/
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $deleteComments=$commentManager->commentsDelete($postId);
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
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $getPost=$postManager->postGet($postId);
    
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $getComments=$commentManager->commentsGet($postId);
    
    require('view/backend/adminCommentView.php');
}

function deleteOldComment($commentId, $postId)
{
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $deleteComment=$commentManager->commentDelete($commentId);
    listComments($postId);
    
}

function activComment($visibility, $commentId, $postId)
{
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $activateComment=$commentManager->commentActivate($visibility, $commentId);
    listComments($postId);
}