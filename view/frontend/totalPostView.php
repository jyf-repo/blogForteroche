<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>

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

<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>