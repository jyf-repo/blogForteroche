<html>

    <head>
        <meta charset="utf-8">
        <title>Billet simple pour l'Alaska - Jean Forteroche</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
<h1>Billet simple pour l'Alaska</h1>
<div id="formulaire">
    <form action="index.php?" method="post">
        <input type="hidden" name="id">
        <input type="text" placeholder="Titre" name="title"><br/><br/>
        <input type="date" name="date"><br/><br/>
        <textarea rows="15" cols="33" name="content">Contenu du texte à remplir</textarea><br/><br/>
        <input type="submit" value="Envoyer"><br/>
    </form>
</div>
<div id="Billets">

<?php

include ("dbConnect.php");
$connex = new DbConnect();
$donnee=$connex->connect();

$edit = $donnee->query('SELECT * FROM ticket');

while ($ticketView=$edit->fetch())
{
    echo htmlspecialchars($ticketView['id'])."<h3> ".htmlspecialchars($ticketView['title'])."<em> ".htmlspecialchars($ticketView['date_creation'])."</em></h3><p>".htmlspecialchars($ticketView['content'])."</p>";
}


?>

</div>

</body>

</html>