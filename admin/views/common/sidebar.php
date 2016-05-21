
<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Helpers\UserHelper as UserHelper;
 ?>

<div class="admin--sidebar aside-nav">

    <div class="header">
        <img class="header--avatar" src="/sources/photos/default.png" />
        <a class="header--avatar-text"><?php echo $loggedUser['name'] ?></a>
    </div>
    <?php if (UserHelper::loggedUserHasPermission(Permissions::LIST_NEWS)){ ?>
    <div class="options">
        <ul class="options--list">
            <li><a class="options--list-item" href="/admin/news">Noticias</a></li>
        </ul>
    <?php } ?>
    <?php if (UserHelper::loggedUserHasPermission(Permissions::LIST_SUBJECTS)){ ?>
        <ul class="options--list">
            <li><a class="options--list-item" href="/admin/subjects">Materias</a></li>
        </ul>
    <?php } ?>
    <?php if (UserHelper::loggedUserHasPermission(Permissions::LIST_FILES)){ ?>
        <ul class="options--list">
            <li><a class="options--list-item" href="/admin/files">Archivos</a></li>
        </ul>
    <?php } ?>
    <?php if (UserHelper::loggedUserHasPermission(Permissions::EDIT_USERS)){ ?>
        <ul class="options--list">
            <li><a class="options--list-item" href="/admin/users">Usuarios</a></li>
        </ul>
    <?php } ?>

    </div>
</div>
