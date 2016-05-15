<link rel="stylesheet" href="sources/lib/materialize/css/materialize.min.css" media="screen" title="no title" charset="utf-8">

<?php

    include_once 'system/utils/UserHelper.php';
    include_once 'views/login/login.modal.php';
    include_once 'system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;

    $loggedUser = UserHelper::getLoggedUser();

?>


<?php if($loggedUser){
    echo 'Welcome ' . $loggedUser['username'];
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
            if(UserHelper::loggedUserHasPermission(Permissions::ADMIN_ACCESS)){
                ?>
                    <a href="admin/index.php">admin</a>
                <?php
            }
         ?>
    <?php
    } else{
        ?>
        <!-- Modal Trigger -->
        <a class="waves-effect waves-light btn modal-trigger" href="#modal-login">Login</a>
        <?php
    }
?>

<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="sources/lib/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="sources/js/app.js"></script>
