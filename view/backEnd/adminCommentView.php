<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>
<p><em>Bonjour, <?= $_SESSION['pseudo'];?> vous etes connecté à l'administration du blog <a href='admin.php?action=deconnexion'>Deconnexion</a></em></p>
<a href="admin.php?action=">Retour à la gestion des billets</a>

<?php
while($dataComments=$getComments->fetch())
{
?>
<p><strong><?=$dataComments['author'];?></strong><em> Le <?=$dataComments['date_comment'];?></em>: <?=$dataComments['comment'];?></p>
<?php
}
?>


<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>