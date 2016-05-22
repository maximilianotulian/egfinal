<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    Use \App\System\Helpers\UserHelper as UserHelper;

    $loggedUser = UserHelper::getLoggedUser();


 ?>

<div class="profile">
    <div class="row profile--wrapper">

        <div class="col s12 m2 no-padding">
            <div class="row sidebar">
                <div class="options">

                    <div class="row profile--user">
                        <div class="col s12">
                            <div class="user">
                                <?php if ($loggedUser['photo']) { ?>
                                    <img class="user--avatar" src="<?php echo $loggedUser['photo'] ?>" />
                                <?php } else { ?>
                                    <img class="user--avatar" src="/sources/photos/default.png" />
                                <?php } ?>
                                <a class="user--avatar-text black-text"><?php echo $loggedUser['name'] ?></a>
                            </div>
                        </div>
                    </div>

                    <ul class="options--list center">
                        <li><a class="options--list-item" href="/profile/">Actualizar perfil</a></li>
                        <li><a class="options--list-item" href="/profile/password">Cambiar contraseña</a></li>
                        <li><a class="options--list-item" href="/profile/subjects">Mis catedras</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col s12 m8 form-wrapper">
            <?php
                $action = (isset($_GET['action']) ? $_GET['action'] : null);

                if ($action === 'password') {
                    include 'edit-password.php';
                } else if ($action === 'subjects') {
                    include 'view-subjects.php';
                } else {
                    include 'edit-profile.php';
                }
            ?>
        </div>
    </div>
</div>
