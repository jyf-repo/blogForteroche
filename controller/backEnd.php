<?php
session_start();

require_once('model/postManager.php');
require_once('model/adminManager.php');
require_once('model/commentManager.php');

function showFormConnect()
{
    require('view/backEnd/connexion.php');
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
            require('view/backEnd/connexion.php');
        }
}

function deconnectAdmin()
{
    session_destroy();
    echo '<div class="alert alert-primary" role="alert">
    Vous êtes déconnecté
    </div>';
    require('view/backEnd/connexion.php');
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

function activPost($postId,$visibility)
{
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $activPost=$postManager->postShow($postId,$visibility);
    listPosts();
}

function addNewPost($title, $content)
{
    var_dump($title, $content);
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $insertPost=$postManager->postInsert($title,$content);
    listPosts();/*header pour eviter de recharger les données* en rechargeant la page*/
}

function insertImage($postId, $imageName)
{
    /*insertion du nom de l'image dans la base*/
    $postManager= new \jyfweb\blogForteroche\model\PostManager();
    $newImage=$postManager->imageNew($postId, $imageName);
    
    /*insertion de l'image dans le dossier public/image/ de l'application*/
    $retour = copy($_FILES['photo']['tmp_name'], 'public/image/'.$_FILES['photo']['name']);
        if($retour) {
            echo '<div class="alert alert-primary" role="alert">
            La photo a bien été envoyée.
            </div>';
        };
    listComments($postId);
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
    
    require('view/backEnd/adminCommentView.php');
}

function deleteOldComment($commentId, $postId)
{
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $deleteComment=$commentManager->commentDelete($commentId);
    listComments($postId);
    
}

function firstComment($commentId, $postId)
{
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $firstComment=$commentManager->commentShow($commentId);
    listComments($postId);
}

function activComment($visibility, $commentId, $postId)
{
    $commentManager=new \jyfweb\blogForteroche\model\CommentManager();
    $activateComment=$commentManager->commentActivate($visibility, $commentId);
    listComments($postId);
}