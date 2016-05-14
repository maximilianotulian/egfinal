<?php

    include_once 'system/utils/UserHelper.php';

    Use \App\System\Helpers\UserHelper as UserHelper;

?>


<?php if(UserHelper::getLoggedUser()){
    echo 'Welcome ' . UserHelper::getLoggedUser()['username'];
    if ( isset($_COOKIE['user']) ){
        echo '<br />cookie saved <br />';
    }else{
        echo '<br />cookie was not saved <br />';
    }
    ?>
        <form class="" action="logout.php" method="post">
            <input type="submit" name="name" value="logout">
        </form>
    <?php
    } else{
        echo '<a href="login.php">login</a><br/><a href="registro.php">register</a>';
    }
?>
