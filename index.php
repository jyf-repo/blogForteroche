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
        elseif($_GET['action']=='totalPosts')
        {
            
            numberOfPosts();
            $limitMax=numberOfPosts();
            totalPosts($limitMax);
        }
        elseif($_GET['action']=='inscription')
        {
            numberOfPosts();
            $limitMax=numberOfPosts();
            var_dump($limitMax);
            $limit=5;
            inscription($_POST['name'], $_POST['email'], $limit, $limitMax);
        }
        
        else
        {
            numberOfPosts();
            $limitMax=numberOfPosts();
            $limit=5;
            listPosts($limit, $limitMax);
           
        }
        
    }
    else
    {
        numberOfPosts();
        $limitMax=numberOfPosts();
        $limit=5;
        listPosts($limit, $limitMax);
        
    }
}
catch (Exception $e)
{
    $errorMessage= $e->getMessage();
    require('view/frontEnd/errorView.php');
}