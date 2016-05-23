<?php
    include 'views/header.php';
    $pagina = (isset($_GET['pagina']) ? $_GET['pagina'] : 'home');
    $archivo = 'views/'.$pagina.'.php';
    ?>

    <div class="content" style="min-height: 350px;">

    <?php if(file_exists($archivo)){
        include $archivo;
    } else {
        include 'views/home.php';
    } ?>

    </div>
    <?php include 'views/footer.php';
?>
