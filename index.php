<?php 

require_once('controller/frontEnd.php');

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
