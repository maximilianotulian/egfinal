<?php

    include_once 'system/utils/UserHelper.php';

    Use \App\System\Helpers\UserHelper as UserHelper;

    if ( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) ){
        $newUser = array(
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email']
        );
        $result = UserHelper::createUser($newUser);
        if ($result['userCreated']){
            echo 'user created !';
            header('Location: index.php');
            die();
        }else{
            foreach ($result['errors'] as $key => $error) {
                print_r($error.'<br />');
            }
        }

    }

 ?>

Registro
<?php
    if (UserHelper::getLoggedUser()){
        print_r(UserHelper::getLoggedUser());
    }else{
        ?>
            <form class="" method="post">
                <input type="text" name="username" value="">
                <input type="text" name="password" value="">
                <input type="text" name="email" value="">
                <input type="submit" name="name" value="crear">
            </form>
        <?php
    }
 ?>
