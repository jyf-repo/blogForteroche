
<?php
session_start()
?>


<html>
    
    <head>
        <meta charset="utf-8">
        <title><?=$title; ?></title>
        <script src="https://kit.fontawesome.com/7c3c8c778f.js"></script>
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/css-bootstrap/bootstrap.min.css">
    </head>
    
    <body>
        
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <span class="navbar-brand mb-0 h1">Billet simple pour l'Alaska </span>
                    <?php
                    if (isset($_SESSION['pseudo']))
                    {                  
                    ?>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="admin.php?action="><i class='fas fa-home' title="Accueil"></i></a>
                        </li>
                        <li class="nav-item active">
                             <a class="nav-link" style="margin-right=0px"  href='admin.php?action=deconnexion'><i class="fas fa-sign-out-alt" title='Deconnexion'></i></a>
                        </li>
                    </ul>
                    <?php 
                    } else {
                        ?>
                    <ul class="navbar-nav">
                    </ul>
                    <?php
                    }
                    ?>
                </div>
            </nav>
        <div class="jumbotron">
        <?= $content; ?>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <script >
            $(document).ready(function(){
            $('#myModal').on('shown.bs.modal', function () {
              $('#myInput').trigger('focus')
            })
            });
        </script>
        <script src="public/js/js-bootstrap/bootstrap.min.js"></script>
    </body>

</html>