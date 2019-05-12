<?php $title='Connexion à l\'administration'?>
<?php ob_start(); ?>

<form method="post" action="admin.php?action=connexion">
    <input type="text" value="Identifiant" name="pseudo">
    <input type="password" value="mot de passe" name="pass">
    <input type="submit" value="Connexion">
</form>



<?php $content=ob_get_clean(); ?>
<?php require('template.php')?>