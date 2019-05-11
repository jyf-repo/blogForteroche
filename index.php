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
        if($_GET['action']=='delPost')
        {
            deleteOldPost($_GET['postId']);
        }
        if($_GET['action']=='correctionPost')
        {
            $correctionPost=$_GET['demande'];
            showPostToModify($correctionPost);
        }
        if($_GET['action']=='updatePost')
        {
            updateOldPost($_GET['postId'],$_POST['title'], $_POST['content']);
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