<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>

<div id="Billets">
    

    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Et voici le nouveau chapitre tant attendu</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Allons le lire...</a></p>
        </div>
    </div>
    
    <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Je vais lire</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          {% include icons/placeholder.svg width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail" %}
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Je vais lire</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          {% include icons/placeholder.svg width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail" %}
        </div>
      </div>
    </div>
    </div>
    
    <main role="main" class="container">
                <div class="row">
                    <div class="col-md-8 blog-main">
    <h2>Liste des billets déjà publiés:</h2>
    <table class="table table-hover"> 
     <tbody>
   
<?php
while ($dataPosts=$listPosts->fetch())
{
?>
    <tr>
        <td>
    <a href="index.php?action=comment&amp;postId=<?=$dataPosts['id'] ?>"><h3><?=htmlspecialchars($dataPosts['title'])?></h3></a><em><?=htmlspecialchars($dataPosts['date_creation'])?></em><p><?=htmlspecialchars($dataPosts['content'])?></p>
    <hr>
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
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                  </div>

                  <div class="p-4">
                    <h4 class="font-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                      <li><a href="#">March 2014</a></li>
                      <li><a href="#">February 2014</a></li>
                      <li><a href="#">January 2014</a></li>
                      <li><a href="#">December 2013</a></li>
                      <li><a href="#">November 2013</a></li>
                      <li><a href="#">October 2013</a></li>
                      <li><a href="#">September 2013</a></li>
                      <li><a href="#">August 2013</a></li>
                      <li><a href="#">July 2013</a></li>
                      <li><a href="#">June 2013</a></li>
                      <li><a href="#">May 2013</a></li>
                      <li><a href="#">April 2013</a></li>
                    </ol>
                  </div>

                  <div class="p-4">
                    <h4 class="font-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                      <li><a href="#">GitHub</a></li>
                      <li><a href="#">Twitter</a></li>
                      <li><a href="#">Facebook</a></li>
                    </ol>
                  </div>
                </aside><!-- /.blog-sidebar -->
        </div>
            </main>
       
<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>