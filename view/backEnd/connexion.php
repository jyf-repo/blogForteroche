<?php $title='Connexion à l\'administration'?>
<?php ob_start(); ?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-4">
<form method="post" action="admin.php?action=connexion">
    <div class="form-group">
    <input type="text" class="form-control"  placeholder='Votre pseudo' name="pseudo">
    </div>
    <div class="form-group">
    <input type="password" class="form-control"  placeholder='Mot de passe' name="pass">
    </div>
    <input type="submit"  class="btn btn-primary" value="Connexion">
</form>
        </div>
    </div>
</div>


<?php $content=ob_get_clean(); ?>
<?php require('template.php')?>