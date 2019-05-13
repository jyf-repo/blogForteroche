<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>
<p><em>Bonjour, <?= $_SESSION['pseudo'];?> vous etes connecté à l'administration du blog <a href='admin.php?action=deconnexion'>Deconnexion</a></em></p>
<a href="admin.php?action=">Retour à la gestion des billets</a>
    
<h3><?= $getPost['title'];?> </h3><em>Le <?= $getPost['date_creation'];?></em> <p><?= $getPost['content'];?></p>
<hr>
<?php
while($dataComments=$getComments->fetch())
{
?>
<p><strong><?=$dataComments['author'];?></strong><em> Le <?=$dataComments['date_comment'];?></em>: <?=$dataComments['comment'];?></p>
<a href="admin.php?action=delComment&amp;commentId=<?=$dataComments['id'];?>&amp;postId=<?=$dataComments['id_ticket'];?>">Supprimer</a>
<?php
if($dataComments['visibility']==1)
{
?>
    <a href="admin.php?action=activation&amp;commentId=<?=$dataComments['id'];?>&amp;postId=<?=$dataComments['id_ticket'];?>&amp;visibility=0">Désactiver</a>

<?php
}
else
{
    ?>
    <a href="admin.php?action=activation&amp;commentId=<?=$dataComments['id'];?>&amp;postId=<?=$dataComments['id_ticket'];?>&amp;visibility=1">Activer</a>
    <?php
}
if ($dataComments['alert']==1)
 {
     echo '<strong><em>Vous avez une alerte sur ce commentaire.</em></strong>';
 } 
 else
 {
     echo '<em>Aucune alerte.</em>';
 }
 ?>
<hr>
<?php
}
?>

<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>