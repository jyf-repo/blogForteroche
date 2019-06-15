<?php 

require_once('controller/backEnd.php');
numberOfPosts();
$limitMax=numberOfPosts();
try
{
    if (isset($_GET['action']))
    {
        if($_GET['action']=='connexion')
        {
            connectAdmin($_POST['pseudo'],$_POST['pass'],$limitMax);
        } 
        else if (isset($_SESSION['pseudo']))
        {
            if($_GET['action']=='deconnexion')
            {
                deconnectAdmin();
            }
            elseif($_GET['action']=='newPost')
            {
                var_dump($_POST['title'],$_POST['content']);
                addNewPost($_POST['title'],$_POST['content'],$limitMax);
            }
            elseif($_GET['action']=='delPost')
            {
                deleteOldPost($_GET['postId'],$limitMax);
            }
            elseif($_GET['action']=='correction')
            {
                
                listPosts($limitMax);
            }
            elseif($_GET['action']=='updatePost')
            {
                updateOldPost($_GET['postId'],$_POST['title'], $_POST['content'],$limitMax);
            }
            elseif($_GET['action']=='imagePost')
            {
                if (isset($_FILES['photo']['tmp_name']))
                {
                    insertImage($_GET['postId'],$_FILES['photo']['name']);
                    var_dump($_FILES['photo']['name']);
                }
                else
                {
                   
                    listPosts($limitMax);
                }
            }
            elseif($_GET['action']=='showPost')
            {
                activPost($_GET['postId'],$_GET['visibility'],$limitMax);
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
            elseif($_GET['action']=='onFirstPage')
            {
                firstComment($_GET['commentId'], $_GET['postId']);
            }
            else
            {
                
                listPosts($limitMax);
            }
        }
        else
        {
            showFormConnect();
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