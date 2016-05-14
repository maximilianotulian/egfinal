<?php

    include_once 'system/utils/UserHelper.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    UserHelper::logOut();
    header('Location: login.php');
    die();
 ?>
