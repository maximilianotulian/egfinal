
<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Helpers\UserHelper as UserHelper;
 ?>

<div class="admin--sidebar aside-nav">
    <?php if (UserHelper::loggedUserHasPermission(Permissions::LIST_NEWS)){ ?>
    <div class="header">
        <img class="header--avatar" src="/uploads/profile/default.png" />
        <a class="header--avatar-text"><?php echo $loggedUser['name'] ?></a>
    </div>

    <div class="options">
        <ul class="options--list">
            <li><a class="options--list-item" href="/admin/news">Agregar noticia</a></li>
        </ul>

    <?php } ?>
    <?php if (UserHelper::loggedUserHasPermission(Permissions::EDIT_USERS)){ ?>
        <ul class="options--list">
            <li><a class="options--list-item" href="/admin/users">Editar usuarios</a></li>
        </ul>
    <?php } ?>
    </div>
</div>
