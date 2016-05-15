
<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Helpers\UserHelper as UserHelper;
 ?>

<div class="admin--sidebar aside-nav">

    <div class="admin--sidebar-header">
        <span class="">

            <img class="" src="http://0.gravatar.com/avatar/0eae3b79fc7792e26ca50d66dd76bfdc?s=50&d=monsterid&r=g" />
            <a class="">Dario Diaz</a>
        </span>
    </div>

    <div class="admin--sidebar-options">
        <?php if (UserHelper::loggedUserHasPermission(Permissions::LIST_NEWS)){ ?>
            <ul>
                <li><a class="admin--sidebar-text" href="/admin/news">Agregar Noticia</a></li>
                <li><a class="admin--sidebar-text" href="/admin/news">Editar Noticia</a></li>
                <li><a class="admin--sidebar-text" href="/admin/news">Eliminar Noticia</a></li>
            </ul>
        <?php } ?>
        <?php if (UserHelper::loggedUserHasPermission(Permissions::EDIT_USERS)){ ?>
            <a href="/admin/users">usuarios</a>
        <?php } ?>
    </div>

</div>
