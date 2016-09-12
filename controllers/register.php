<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/system/utils/Flags.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Mailer.php';

    Use \App\System\Helpers\Flags as Flags;
    Use \App\System\Helpers\UserHelper as UserHelper;


    if ( !isset($_POST['name']) && !isset($_POST['lastname']) && !isset($_POST['username']) && !isset($_POST['password']) && !isset($_POST['email']) ){
        header('Location: /account/register?incomplete=true');
        die();
    }

    $new_user = array(
        'name' => $_POST['name'],
        'lastname' => $_POST['lastname'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'email' => $_POST['email'],
    );

    $register = UserHelper::createUser($new_user);

    if($register['userCreated']){
        $mailer = new Mailer();
        $mailer->setFrom("portal.comunicaciones.noreply@gmail.com", "Portal de Comunicaciones");
        $mailer->setAddress($new_user['email'], $new_user['name']);
        $mailer->setSubject('Gracias por registrarte!');
        $mailer->setBody('Tu registro fue exitoso.');
        $mailer->sendEmail();
        header('Location: /home');
    }else{
        $errors = '?';
        if(in_array(Flags::USERNAME_ALREADY_USED, $register['errors'])) $errors .= '&user_exist=true';
        if(in_array(Flags::EMAIL_ALREADY_USED, $register['errors'])) $errors .= '&email_exist=true';
        header('Location: /account/register'.$errors);
    }

 ?>
