<div class="profile container">
    <div class="row profile--wrapper">

        <div class="col s12 m4">
            <div class="row sidebar">
                <div class="options">
                    <ul class="options--list">
                        <li><a class="options--list-item" href="/profile?action=profile">Actualizar perfil</a></li>
                        <li><a class="options--list-item" href="/profile?action=password">Cambiar contraseña</a></li>
                        <li><a class="options--list-item" href="/profile?action=account">Deshabilitar cuenta</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col s12 m8">

            <div class="row profile--user">
                <div class="col s12">
                    <div class="user">
                        <img class="user--avatar" src="/sources/photos/default.png" />
                        <a class="user--avatar-text"><?php echo $loggedUser['name'] ?></a>
                    </div>
                </div>
            </div>

            <?php
                $action = (isset($_GET['action']) ? $_GET['action'] : null);

                if ($action === 'password') {
                    include 'edit-password.php';
                } else if ($action === 'account') {
                    include 'delete-account.php';
                } else {
                    include 'edit-profile.php';
                }
            ?>
        </div>
    </div>
</div>
