<div class="profile container">
    <div class="row profile--wrapper">

        <div class="col s12 m4">
            <div class="row sidebar">
                <div class="options">
                    <ul class="options--list">
                        <li><a class="options--list-item" href="/profile/">Actualizar perfil</a></li>
                        <li><a class="options--list-item" href="/profile/password">Cambiar contraseña</a></li>
                        <li><a class="options--list-item" href="/profile/account">Deshabilitar cuenta</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col s12 m8">
            <?php
                include 'user.php';

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
