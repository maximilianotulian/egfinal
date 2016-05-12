<?php

    $pagina = $_GET['pagina'];
    $archivo = 'views/'.$pagina.'.php';

    if(file_exists($archivo)){
        include $archivo;
    } else {
        include 'views/home.php';
    }

 ?>

<div class="" style="height:500px;">
asd
</div>
<div class="" style="background-image:url(trees-background.jpg); height:500px;background-attachment:fixed">

</div>
<div class="" style="height:500px;">
asd
</div>
