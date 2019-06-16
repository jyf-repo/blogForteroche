<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>
<?php
while($dataContacts=$showContacts->fetch())
{
?>
<tr>
    <td>
        Nom: <?=$dataContacts['name'] ?>
    </td>
    <td>
        Email: <?=$dataContacts['email'] ?>
    </td>
</tr>
<br/>
<?php
}
?>

<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>