<?php 

require_once('controller/frontEnd.php');
try
{
    if (isset($_GET['action']))
    {
        if($_GET['action']=='comment')
        {
            listComments($_GET['postId']);
        }
        elseif($_GET['action']=='newComment')
        {
            addNewComment($_GET['postId'], $_POST['author'], $_POST['comment']);
        }
        elseif($_GET['action']=='alertComment')
        {
            newAlertComment($_GET['commentId'], $_GET['postId']);
           
        }
        else
        {
           
            listPosts();
           
        }
        
    }
    else
    {
       
        listPosts();
        
    }
}
catch (Exception $e)
{
    $errorMessage= $e->getMessage();
    require('view/frontEnd/errorView.php');
}