<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/UserRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    Use \App\System\Repositories\UserRepository as UserRepository;
    Use \App\System\Helpers\UserHelper as UserHelper;


    if (isset($_POST['old_password1']) && isset($_POST['password_new'])){
        $loggedUser = UserHelper::getLoggedUser();
        $user = array(
            'id' => $loggedUser['id'],
            'username' => $loggedUser['username'],
            'password' => $_POST['old_password1']
        );
        if (UserHelper::login($user) === true){
            $user['password'] = $_POST['password_new'];
            UserHelper::changePassword($user);
            header('Location: /profile/password?success=true');
        }else{
            header('Location: /profile/password?success=false');
        }
    }


 ?>
