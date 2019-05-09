<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>

<div id="formulaire">
    <form action="index.php?action=newPost" method="post">
        <input type="hidden" name="id">
        <input type="text" placeholder="Titre" name="title"><br/><br/>
        <input type="date" name="date"><br/><br/>
        <textarea rows="15" cols="33" name="content">Contenu du texte à remplir</textarea><br/><br/>
        <input type="submit" value="Envoyer"><br/>
    </form>
</div>
<div id="Billets">

<?php

while ($dataPosts=$listPosts->fetch())
{
    echo htmlspecialchars($dataPosts['id'])."<h3> ".htmlspecialchars($dataPosts['title'])."<em> ".htmlspecialchars($dataPosts['date_creation'])."</em></h3><p>".htmlspecialchars($dataPosts['content'])."</p>";
}

?>

</div>

<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>