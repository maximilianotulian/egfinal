<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;

    $loggedUser = UserHelper::getLoggedUser();

    if(!UserHelper::loggedUserHasPermission(Permissions::ADMIN_ACCESS)){
        header('Location: /home');
    }

    include $_SERVER["DOCUMENT_ROOT"].'/admin/views/common/header.php';

    $pagina = (isset($_GET['pagina']) ? $_GET['pagina'] : 'home');

?>

<div class="admin row">
    <div class="col s2 no-padding">
        <?php include $_SERVER["DOCUMENT_ROOT"].'/admin/views/common/sidebar.php'; ?>
    </div>
    <div class="col s10">
        <?php include_once $_SERVER["DOCUMENT_ROOT"] .'/admin/views/pages/'.$pagina.'/'.$pagina.'.php' ?>
    </div>
</div>

<?php
    include $_SERVER["DOCUMENT_ROOT"].'/admin/views/common/footer.php';
 ?>
