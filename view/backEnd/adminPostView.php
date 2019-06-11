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
            <img src="public/image/<?= $dataPosts['image'];?>" width="100px">
        </td>
        <td>
           <a class="btn btn-outline-secondary btn-sm" data-toggle="collapse" href="#modifierImage<?= $dataPosts['id']; ?>" role="button" aria-expanded="false" aria-controls="modifierImage<?= $dataPosts['id']; ?>">
        <i class="far fa-image "></i>
    </a>
    <div class="collapse" id="modifierImage<?= $dataPosts['id']; ?>">
      <div class="card card-body">
        <form method="post" enctype="multipart/form-data" action="admin.php?action=imagePost&amp;postId=<?=$dataPosts['id']?>">
            <input type="file" name="photo"> <br/><br/>
            <input type="submit" value="Envoyer">
        </form>
      </div>
    </div>
        </td>
        <td>
    <a class="btn btn-outline-primary btn-sm" data-toggle="collapse" href="#modifierArticle<?= $dataPosts['id']; ?>" role="button" aria-expanded="false" aria-controls="modifierArticle<?= $dataPosts['id']; ?>">
        <i class="fas fa-edit "></i>
    </a>
    <div class="collapse" id="modifierArticle<?= $dataPosts['id']; ?>">
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
    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
        <i class="far fa-trash-alt "></i>
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
            <a role="button" class="btn btn-outline-secondary btn-sm" href="admin.php?action=comment&amp;postId=<?=$dataPosts['id']?>">
                <i class="far fa-comments "></i>
            </a>
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