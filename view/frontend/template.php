<html>
    
    <head>
        <meta charset="utf-8">
        <title><?=$title; ?></title>
        <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/7c3c8c778f.js"></script>
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/css-bootstrap/bootstrap.min.css">
    </head>
    
    <div class="container-fluid">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-2 pt-1">
                </div>
                <div class="col-10 ">
                <h1 class="blog-header-logo display-3" >Billet simple pour l'Alaska</h1><p>de Jean Forteroche</p>
                </div>
                <div class="col-2 d-flex justify-content-end align-items-center">
                </div>
            </div>
        </header>
        <hr>
    <body>
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
              <a class="p-2 text-muted" href="index.php"><i class="fas fa-home"></i> Accueil</a>
              <a class="p-2 text-muted" href="index.php?action=totalPosts"><i class="fas fa-newspaper"></i> Chapitres</a>
                <a class="p-2 text-muted" href="index.php?#inscrire"><i class="fas fa-user-plus"></i> S'incrire</a>
            </nav>
        </div>
        <hr>
                    <?= $content; ?>
                   
        <script src="public/js/js-bootstrap/boostrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script >
            $(document).ready(function(){
            $('#myModal').on('shown.bs.modal', function () {
              $('#myInput').trigger('focus')
            })
            });
        </script>
        
    </body>
    
    <footer class="blog-footer">
    Ce site est totalement imaginaire <i class="far fa-copyright"></i> jyfweb
    </footer>
    
</html>
