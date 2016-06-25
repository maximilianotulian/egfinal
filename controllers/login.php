<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';

    Use \App\System\Helpers\UserHelper as UserHelper;

    if ( !isset($_POST['username']) && !isset($_POST['password']) ){
        header('Location: /account/bad_login');
        die();
    }

    $user = array(
        'username' => $_POST['username'],
        'password' => $_POST['password']
    );

    if(isset($_POST['remember_me']) && $_POST['remember_me'] == "true"){
      $remember = true;
    }else{
      $remember = false;
    }
    if (UserHelper::login($user, $remember) === true){
        header('Location: /home');
        die();
    }else{
        header('Location: /account/bad_login');
        die();
    }

 ?>
