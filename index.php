<?php
    include 'views/header.php';
    $pagina = $_GET['pagina'];
    $archivo = 'views/'.$pagina.'.php';

    if(file_exists($archivo)){
        include $archivo;
    } else {
        include 'views/home.php';
    }

    include 'views/footer.php';
 ?>
