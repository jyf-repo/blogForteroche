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