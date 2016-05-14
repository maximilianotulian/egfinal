<?php

    include_once 'system/utils/UserHelper.php';

    Use \App\System\Helpers\UserHelper as UserHelper;

    if ( isset($_POST['username']) && isset($_POST['password']) ){
        $newUser = array(
            'username' => $_POST['username'],
            'password' => $_POST['password'],
        );
        if(UserHelper::login($newUser, isset($_POST['remember_me']) ? $_POST['remember_me'] : false) === true){
            header('Location: index.php');
        }else{
            print_r('BAD USER OR PASSWORD');
        }
    }

 ?>


<?php
    if (!UserHelper::getLoggedUser()){
        ?>
            Login
            <form class="" method="post">
                <input type="text" name="username" value="">
                <input type="text" name="password" value="">
                Recordarme <input type="checkbox" name="remember_me">
                <input type="submit" name="name" value="login">
            </form>
        <?php
    }
 ?>
