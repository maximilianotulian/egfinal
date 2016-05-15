<link rel="stylesheet" href="sources/lib/materialize/css/materialize.min.css" media="screen" title="no title" charset="utf-8">

<?php
    include_once 'system/utils/UserHelper.php';
    include_once 'views/login/login.modal.php';
    include_once 'system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;

    $loggedUser = UserHelper::getLoggedUser();

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
