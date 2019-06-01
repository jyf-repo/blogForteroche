<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>

<h3><?= $getPost['title'];?> </h3><em>Le <?= $getPost['date_creation'];?></em> <p><?= $getPost['content'];?></p>
<hr>
<table class="table table-borderless">
    <tbody>
<?php
while($dataComments=$getComments->fetch())
{
?>

        <tr>
            <td>
<strong><?=$dataComments['author'];?></strong><em> Le <?=$dataComments['date_comment'];?></em>: <?=$dataComments['comment'];?>
            </td>
            <td>
        
    <?php

if ($dataComments['alert']==1)
 {
     echo '<span class="badge badge-pill badge-danger ">Ce commentaire à généré au moins une alerte.</span>';
 } 
 else
 {
     echo '<span class="badge badge-pill badge-success">Pas  d\'alerte pour ce commentaire.</span>';
 }

?>   
            </td>
            <td>

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
  Supprimer
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Etes-vous sur de vouloir supprimer ce commentaire?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
        <a role="button" class="btn btn-danger" href="admin.php?action=delComment&amp;commentId=<?=$dataComments['id'];?>&amp;postId=<?=$dataComments['id_ticket'];?>">Supprimer</a>
      </div>
    </div>
  </div>
</div>
                 </td>
            <td>
<?php
if($dataComments['visibility']==1)
{
?>
<a role="button" class="btn btn-success btn-sm" href="admin.php?action=activation&amp;commentId=<?=$dataComments['id'];?>&amp;postId=<?=$dataComments['id_ticket'];?>&amp;visibility=0">
    Désactiver
</a>

<?php
}
else
{
    ?>

    <a role="button" class="btn btn-danger btn-sm" href="admin.php?action=activation&amp;commentId=<?=$dataComments['id'];?>&amp;postId=<?=$dataComments['id_ticket'];?>&amp;visibility=1">Activer</a>

<?php
}
 ?>
            </td>
        </tr>
            <?php
}
?>
    </tbody>
</table>

<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>