<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>
<h2>Nouveau billet à rédiger:</h2>
<div id="formulaire">
    <form action="index.php?action=newPost" method="post">
        <input type="hidden" name="id">
        <input type="text" placeholder="Titre" name="title"><br/><br/>
        <textarea rows="5" cols="50" name="content"placeholder="Zone de texte à remplir"></textarea><br/><br/>
        <input type="submit" value="Envoyer"><br/>
    </form>
</div>

<div id="Billets">
<h2>Liste des billets précedents:</h2>
<?php

while ($dataPosts=$listPosts->fetch())
{
    ?>
    
    <h3><?=htmlspecialchars($dataPosts['title'])?></h3><em><?=htmlspecialchars($dataPosts['date_creation'])?></em><p><?=htmlspecialchars($dataPosts['content'])?></p>
    <a href="index.php?action=correctionPost&amp;demande=<?=$dataPosts['id']?>">Modifier</a>
    <a href="index.php?action=delPost&amp;postId=<?=$dataPosts['id']?>">Supprimer</a>
    
    <?php
        
        if(isset($_GET['demande']))
        {
            if($_GET['demande']==$dataPosts['id'])
                {
           ?>
    <form method="post" action="index.php?action=updatePost&amp;postId=<?=$dataPosts['id']?>">
        <input type="text" name="title" value="<?=$dataPosts['title']?>"><br/><br/>
        <textarea rows="5" cols="50" name="content"><?=$dataPosts['content']?></textarea><br/><br/>
        <input type="submit" value="Valider les modifications">
    </form>
    <hr>
                <?php
                } else {
                echo '<hr>';
            }
        } else {
            echo '<hr>';
        }
    
}

?>

</div>

<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>