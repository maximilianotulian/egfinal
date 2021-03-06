<?php

include_once 'system/utils/UserHelper.php';
include_once 'system/utils/Permissions.php';
Use \App\System\Helpers\UserHelper as UserHelper;
Use \App\System\Helpers\Permissions as Permissions;

$loggedUser = UserHelper::getLoggedUser();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Portal de comunicación para entornos educativos</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/sources/genericons/genericons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link href="/sources/genericons/genericons.css" type="text/css" rel="stylesheet" media="screen"/>
    <link href="/sources/css/style.css" type="text/css" rel="stylesheet" media="screen"/>
    <link href="/sources/css/main.css" type="text/css" rel="stylesheet" media="screen" />

</head>
<body>
    <nav class="header">
        <div class="header--nav-wrapper container">
            <img src="/sources/photos/Logo_Portal.png" class="header--nav-logo" alt="Portal de Entornos Educativos - Logo"/>
            <ul class="header--nav-list">
                <li><a href="/home">Inicio</a></li>
                <?php if($loggedUser) { ?>
                    <li><a href="/subjects">Catedras</a></li>
                <?php } ?>
                <li><a href="/contact">Contacto</a></li>
                <li><a href="/us">Nosotros</a></li>
                <li><a href="/news">Noticias</a></li>

                <?php if($loggedUser) {?>
                    <li>
                        <a class="dropdown-button" href="#!" data-beloworigin="true" data-activates="user-dropdown"><?php echo $loggedUser['name'] ?><i class="material-icons right">arrow_drop_down</i></a>
                        <ul id="user-dropdown" class="dropdown-content">
                            <?php if (UserHelper::loggedUserHasPermission(Permissions::ADMIN_ACCESS)) { ?>
                            <li><a href="/admin/">Administración</a></li>
                            <?php } ?>
                            <li><a href="/profile">Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="/logout">Salir</a></li>
                        </ul>
                    </li>
                <?php } else {?>
                <li><a class="modal-trigger" href="#login-modal">Iniciar sesión / Registrarse</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
<?php include 'log-in.php'; ?>
