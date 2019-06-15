<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>

<div id="Billets">
 <?php
    
    ?>
<div class='fond'>
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-transparent">
        
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Voici le nouveau chapitre tant attendu: <?= $getPost['title'];?></h1>
          <p class="lead my-3"> <em>Le <?= $getPost['date_creation'];?></em>
            <?=substr(htmlspecialchars($getPost['content']),0,100)?> ... </p>
        
          <p class="lead mb-0"><a href="index.php?action=comment&amp;postId=<?=$getPost['id'] ?>" class="text-white font-weight-bold">Découvrir...</a></p>
        </div>
    </div>
    </div>
    
    <hr>
    
    <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Vos commentaires</strong>
          <h3 class="mb-0"><?=htmlspecialchars($seeComment['author'])?></h3>
          <div class="mb-1 text-muted"><?=htmlspecialchars($seeComment['date_comment'])?></div>
          <p class="card-text mb-auto"><?=substr(htmlspecialchars($seeComment['comment']),0,50)?> ... </p>
          <a href="index.php?action=comment&amp;postId=<?=$seeComment['id_ticket'] ?>" class="stretched-link">A voir</a>
        </div>
          
        <div class="col-auto d-none d-lg-block">
          <img src="public/image/commentaires.jpg" class="rounded float-right" width="250"  background="#55595c" color="#eceeef" text="Thumbnail" alt="image">
        </div>
      </div>
    </div>
       
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">La presse en parle</strong>
            <h3 class="mb-0"><?=htmlspecialchars($seePost['title'])?></h3>
          <div class="mb-1 text-muted"><?=htmlspecialchars($seePost['date_creation'])?></div>
          <p class="card-text mb-auto"><?=substr(htmlspecialchars($seePost['content']),0,20)?> ... </p>
          <a href="index.php?action=comment&amp;postId=<?=$seePost['id'] ?>" class="stretched-link">Relire ce chapitre</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="public/image/<?= $seePost['image'];?>" class="rounded float-right" width="250" background="#55595c" color="#eceeef" text="Thumbnail" alt="autre image">
        </div>
      </div>
    </div>
      
    </div>
    
    <hr>
   
    <main role="main" class="container">
                <div class="row">
                    <div class="col-md-8 blog-main">
    <h3 class="display-5">Derniers articles publiés:</h3>
    <table class="table table-hover"> 
    <tbody>
   
<?php

while ($dataPosts=$listPosts->fetch())
{
?>
    <tr>
        <td>
            <a href="index.php?action=comment&amp;postId=<?=$dataPosts['id'] ?>"><h3><?=htmlspecialchars($dataPosts['title'])?></h3></a><em><?=htmlspecialchars($dataPosts['date_creation'])?></em><p><?=substr(htmlspecialchars($dataPosts['content']),0,50)?> ... </p>
            <p>Lire la suite</p>
        </td>
        <td>
            <img src="public/image/<?= $dataPosts['image'];?>" class="rounded float-right" width="150px">
        </td>
        </tr>
<?php
}
?>
        </tbody>
        </table>
                    </div>
                
                <aside class="col-md-4 blog-sidebar">
                  <div id="inscrire" class="p-4 mb-3 bg-light rounded">
                    <h4 class="font-italic">S'inscrire</h4>
                      <form method="post" action='index.php?action=inscription'>
                          <input type="text" name="name" placeholder='Nom'><br/>
                          <input type="email" name="email" placeholder='Email'><br/>
                          <input type="submit" value="Envoyer">
                      </form>
                    <p class="mb-0">Profitez des nouvelles parutions en avant premiere et des rendez-vous litteraires avec l'auteur.</p>
                  </div>

                  <div class="p-4">
                    <h4 class="font-italic">Historique</h4>
                    <ol class="list-unstyled mb-0">
<?php
                        
while($againPosts=$listDatePosts->fetch())
{
?>
                        <li><a href="index.php?action=comment&amp;postId=<?=$againPosts['id']; ?>"><?=htmlspecialchars($againPosts['date_creation']);?></a></li>
<?php
}
?>
                      
                    </ol>
                  </div>

                  <div class="p-4">
                    <h4 class="font-italic">Suivez-nous:</h4>
                    <ol class="list-unstyled">
                      <a href="#"><i class="fab fa-github fa-2x" style="color: black"></i> </a>
                      <a href="#"><i class="fab fa-twitter fa-2x" style="color: lightblue"></i> </a>
                      <a href="#"><i class="fab fa-facebook-f fa-2x"></i> </a>
                    </ol>
                  </div>
                </aside><!-- /.blog-sidebar -->
        </div>
            </main>
       
<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>