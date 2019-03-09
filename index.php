<html>

    <head>
        <meta charset="utf-8">
        <title>Billet simple pour l'Alaska - Jean Forteroche</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
<h1>Billet simple pour l'Alaska</h1>
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