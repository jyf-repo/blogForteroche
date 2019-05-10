<?php 

require_once('controller/backEnd.php');
try
{
    

    if (isset($_GET['action']))
    {
        if($_GET['action']=='newPost')
        {
            addNewPost($_POST['title'],$_POST['content']);
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
    require('view/backEnd/errorView.php');
}