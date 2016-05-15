<div class="container">
    <div class="row">

        <form class="col s12 m5" method="post" action="/controllers/login.php">
            <h4>Ingresá</h4>
            <p>
                Ingresá tus datos de usuario para acceder al sitio.
            </p>
            <div class="row">
                <div class="input-field col s12">
                    <input id="username" type="text" class="validate" name="username" required="required" title="Por favor ingrese su usuario">
                    <label for="username">Usuario</label>
                </div>
            </div>

            <div class="row mbottom-0">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password" required="required" title="Por favor ingrese su contraseña">
                    <label for="password">Contraseña</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 mtop-0">
                    <input type="checkbox" class="filled-in" id="filled-in-box" name="remember_me" value="true"/>
                    <label for="filled-in-box">Recordarme</label>
                </div>
            </div>
            <?php if (isset($_GET['bad_login'])) { ?>
            <p class="warning">
                El usuario o contraseña ingresados son incorrectos. <br>Por favor verificá los datos.
            </p>
            <?php } ?>
            <button class="right btn waves-effect waves-light" type="submit" name="action">
                Ingresar
                <i class="material-icons right">trending_flat</i>
            </button>

        </form>

        <form class="col s12 m5 offset-m2">
            <h4>Registro</h4>
            <p>
                Completá el siguiente formulario con tus datos para obtener una cuenta.
            </p>
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" class="validate">
                    <label for="first_name">Nombre</label>
                </div>

                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Apellido</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input id="password" type="password" class="validate">
                    <label for="password">Contraseña</label>
                </div>

                <div class="input-field col s6">
                    <input id="repeat-password" type="password" class="validate">
                    <label for="repeat-password">Repetir Contraseña</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>

            <button class="right btn waves-effect waves-light" type="submit" name="action">
                Registrarse
                <i class="material-icons right">send</i>
            </button>

        </form>
    </div>
</div>
