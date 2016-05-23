<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';

    Use \App\System\Helpers\UserHelper as UserHelper;

    UserHelper::logout();
    header('Location: /home');

 ?>
