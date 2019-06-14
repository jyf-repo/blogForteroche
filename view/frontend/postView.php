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
        
          <p class="lead mb-0"><a href="index.php?action=comment&amp;postId=<?=$getPost['id'] ?>" class="text-white font-weight-bold">Allons le lire...</a></p>
        </div>
    </div>
    </div>
    
    <hr>
    
    <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Commentaires</strong>
          <h3 class="mb-0"><?=htmlspecialchars($seeComment['author'])?></h3>
          <div class="mb-1 text-muted"><?=htmlspecialchars($seeComment['date_comment'])?></div>
          <p class="card-text mb-auto"><?=substr(htmlspecialchars($seeComment['comment']),0,50)?> ... </p>
          <a href="index.php?action=comment&amp;postId=<?=$seeComment['id_ticket'] ?>" class="stretched-link">Je vais lire</a>
        </div>
          
        <div class="col-auto d-none d-lg-block">
          <img src="public/image/commentaires.jpg" width="250"  background="#55595c" color="#eceeef" text="Thumbnail" alt="image">
        </div>
      </div>
    </div>
       
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Presse</strong>
          <h3><?=htmlspecialchars($seePost['title'])?></h3></a>
          <div class="mb-1 text-muted"><?=htmlspecialchars($seePost['date_creation'])?></div>
          <p class="mb-auto"><?=substr(htmlspecialchars($seePost['content']),0,50)?> ... </p>
          <a href="index.php?action=comment&amp;postId=<?=$seePost['id'] ?>" class="stretched-link">Je vais lire</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="public/image/<?= $seePost['image'];?>" width="250" background="#55595c" color="#eceeef" text="Thumbnail" alt="autre image">
        </div>
      </div>
    </div>
      
    </div>
    
    <hr>
   
    <main role="main" class="container">
                <div class="row">
                    <div class="col-md-8 blog-main">
    <h2>Articles publiés:</h2>
    <table class="table table-hover"> 
    <tbody>
   
<?php
      
while ($dataPosts=$listPosts->fetch())
{
?>
    <tr>
        <td>
            <a href="index.php?action=comment&amp;postId=<?=$dataPosts['id'] ?>"><h3><?=htmlspecialchars($dataPosts['title'])?></h3></a><em><?=htmlspecialchars($dataPosts['date_creation'])?></em><p><?=htmlspecialchars($dataPosts['content'])?></p>
        </td>
        <td>
            <img src="public/image/<?= $dataPosts['image'];?>" width="150px">
        </td>
        </tr>
<?php
}
?>
        </tbody>
        </table>
                    </div>
                
                <aside class="col-md-4 blog-sidebar">
                  <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="font-italic">A propos</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                  </div>

                  <div class="p-4">
                    <h4 class="font-italic">Archives</h4>
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