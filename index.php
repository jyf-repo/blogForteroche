<?php 

require_once('controller/frontEnd.php');
try
{
    

    if (isset($_GET['action']))
    {
        if($_GET['action']=='newPost')
        {

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
    require('view/errorView.php');
}