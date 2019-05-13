<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>

<div id="Billets">
<h2>Liste des billets déjà publiés:</h2>
   
<?php
while ($dataPosts=$listPosts->fetch())
{
?>
    
    <a href="index.php?action=comment&amp;postId=<?=$dataPosts['id'] ?>"><h3><?=htmlspecialchars($dataPosts['title'])?></h3></a><em><?=htmlspecialchars($dataPosts['date_creation'])?></em><p><?=htmlspecialchars($dataPosts['content'])?></p>
    <hr>
    
<?php
}
?>
    
<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>