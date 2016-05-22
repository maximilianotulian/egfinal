<div class="container account">
    <div class="section account">
        <div class="row">
            <form class="col s12 l8 offset-l2" method="post" action="/controllers/register.php">
                <h4>Registro</h4>
                <p>
                    Si es alumno o docente de la institucion complete el siguiente formulario con sus datos para obtener una cuenta.
                </p>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate" name="name" required="required">
                        <label for="first_name">Nombre</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="lastname" required="required">
                        <label for="last_name">Apellido</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 l6">
                        <input id="username" type="text" class="validate" name="username" required="required">
                        <label for="username">Nombre de usuario</label>
                    </div>
                    <?php if (isset($_GET['user_exist'])) {?>
                        <p class="warning">
                            El nombre de usuario ya está en uso.
                        </p>
                        <?php } ?>
                        <div class="input-field col s12 l6">
                            <input id="email" type="email" class="validate" name="email" required="required">
                            <label for="email">Email</label>
                        </div>
                        <?php if (isset($_GET['email_exist'])) {?>
                            <p class="warning">
                                El email ya está en uso.
                            </p>
                            <?php } ?>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="password" required="required">
                        <label for="password">Contraseña</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="repeat-password" type="password" class="validate" name="password_repeat" required="required">
                        <label for="repeat-password">Repetir Contraseña</label>
                    </div>
                </div>
                
                <button class="right btn waves-effect waves-light" type="submit" name="action">
                    Registrarse
                </button>

            </form>
        </div>
    </div>
</div>
