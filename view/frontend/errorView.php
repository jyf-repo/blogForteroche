<?php $title='Message d\'erreurs'; ?>
<h1>Voici le message d'erreur:</h1>
<?php ob_start(); ?>
<?= $errorMessage; ?>
<?php $content= ob_get_clean();?>
<?php require('template.php'); ?>