<?php 

require_once('controller/backEnd.php');
try
{
    if (isset($_GET['action']))
    {
        if($_GET['action']=='connexion')
        {
            connectAdmin($_POST['pseudo'],$_POST['pass']);
        }
        elseif($_GET['action']=='deconnexion')
        {
            deconnectAdmin();
        }
        elseif($_GET['action']=='newPost')
        {
            addNewPost($_POST['title'],$_POST['content']);
        }
        elseif($_GET['action']=='delPost')
        {
            deleteOldPost($_GET['postId']);
        }
        elseif($_GET['action']=='correction')
        {
            listPosts();
        }
        elseif($_GET['action']=='updatePost')
        {
            updateOldPost($_GET['postId'],$_POST['title'], $_POST['content']);
        }
        elseif($_GET['action']=='comment')
        {
            listComments($_GET['postId']);
        }
        elseif($_GET['action']=='delComment')
        {
            deleteOldComment($_GET['commentId'], $_GET['postId']);
        }
       elseif($_GET['action']=='activation')
        {
            activComment($_GET['visibility'], $_GET['commentId'], $_GET['postId']);
        }
        else
        {
            listPosts();
        }
    }
    else
    {
       showFormConnect();
    }
}
catch (Exception $e)
{
    $errorMessage= $e->getMessage();
    require('view/backEnd/errorView.php');
}