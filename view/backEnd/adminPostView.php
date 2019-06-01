<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>

    
<div id="Billets">
<h2>Articles déjà publiés</h2>
 <table class="table table-hover"> 
     <tbody>
<?php
while ($dataPosts=$listPosts->fetch())
{
?>
    <tr>
        <td>
    <h3><?=htmlspecialchars($dataPosts['title'])?></h3><em><?=htmlspecialchars($dataPosts['date_creation'])?></em><p><?=htmlspecialchars($dataPosts['content'])?></p>
    
        </td>
        <td>
    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Modifier
    </a>
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
        <form method="post" action="admin.php?action=updatePost&amp;postId=<?=$dataPosts['id']?>">
            <input type="text" name="title" value="<?=$dataPosts['title']?>"><br/><br/>
            <textarea rows="5" cols="50" name="content"><?=$dataPosts['content']?></textarea><br/><br/>
            <input type="submit" value="Valider les modifications">
        </form>
      </div>
    </div>
     </td>
        <td>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
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
              <p>Etes-vous sur de vouloir supprimer cet article?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <a role="button" class="btn btn-danger" href="admin.php?action=delPost&amp;postId=<?=$dataPosts['id']?>">Supprimer</a>
          </div>
        </div>
      </div>
    </div>
     </td>
        <td>
    <a role="button" class="btn btn-secondary btn-sm" href="admin.php?action=comment&amp;postId=<?=$dataPosts['id']?>">Commentaires</a>
        </td>
         </tr>
<?php       
}
?>
     </tbody>
    </table>
</div>

<div id="formulaire">
    <h2>Rédiger un nouveau billet:</h2>
    <div class="container">
        <div class="row">
            <div class="col">
            <form action="admin.php?action=newPost" method="post">
                <input type="hidden" name="id">
                <div class="form-group">
                <input type="text" placeholder="Titre" name="title">
                </div>
                <div class="form-group">
                <textarea rows="5" cols="50" name="content"placeholder="Zone de texte à remplir"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Envoyer"><br/>
            </form>
            </div>
        </div>
    </div>
        
   
   
</div>

<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>