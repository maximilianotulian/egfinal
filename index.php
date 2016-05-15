<link rel="stylesheet" href="sources/lib/materialize/css/materialize.min.css" media="screen" title="no title" charset="utf-8">

<?php
    include 'views/header.php';
    $pagina = (isset($_GET['pagina']) ? $_GET['pagina'] : 'home');
    $archivo = 'views/'.$pagina.'.php';

    if(file_exists($archivo)){
        include $archivo;
    } else {
        include 'views/home.php';
    }

    include 'views/footer.php';
?>
