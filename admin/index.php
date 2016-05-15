<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;

    $loggedUser = UserHelper::getLoggedUser();

    if(!UserHelper::loggedUserHasPermission(Permissions::ADMIN_ACCESS)){
        header('Location: /index.php');
    }

    include $_SERVER["DOCUMENT_ROOT"].'/admin/views/common/header.php';

    $pagina = (isset($_GET['pagina']) ? $_GET['pagina'] : 'home');

?>

<link rel="stylesheet" href="/sources/lib/materialize/css/materialize.min.css" media="screen" title="no title" charset="utf-8">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="row">
    <div class="col s2">
        <?php include $_SERVER["DOCUMENT_ROOT"].'/admin/views/common/sidebar.php'; ?>
    </div>
    <div class="col s10">
        <?php include_once $_SERVER["DOCUMENT_ROOT"] .'/admin/views/pages/'.$pagina.'/'.$pagina.'.php' ?>
    </div>
</div>

<script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/sources/lib/materialize/js/materialize.min.js"></script>
