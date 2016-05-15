<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Helpers\UserHelper as UserHelper;
 ?>

<?php if (UserHelper::loggedUserHasPermission(Permissions::LIST_NEWS)){ ?>
    <a href="/admin/news">noticias</a>
<?php } ?>
<?php if (UserHelper::loggedUserHasPermission(Permissions::EDIT_USERS)){ ?>
    <a href="/admin/users">usuarios</a>
<?php } ?>
