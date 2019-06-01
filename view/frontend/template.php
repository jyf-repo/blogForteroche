<html>
    
    <head>
        <meta charset="utf-8">
        <title><?=$title; ?></title>
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/css-bootstrap/bootstrap.min.css">
    </head>
    
    <body>
        <div class="jumbotron">
    <h1>Billet simple pour l'Alaska</h1>
        <?= $content; ?>
        </div>
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

</html>
