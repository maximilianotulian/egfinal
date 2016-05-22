<form method="post" action="/controllers/login.php">
    
    <div class="input-field margin">
        <input id="username" type="text" class="validate" name="username" required="required" title="Por favor ingrese su usuario">
        <label for="username">Usuario</label>
    </div>
    <div class="input-field margin">
        <input id="password" type="password" class="validate" name="password" required="required" title="Por favor ingrese su contraseña">
        <label for="password">Contraseña</label>
    </div>
    <div class="input-field margin">
        <input type="checkbox" class="filled-in" id="filled-in-box" name="remember_me" value="true"/>
        <label for="filled-in-box">Recordarme</label>
    </div>
    <?php if (isset($_GET['bad_login'])) { ?>
        <p class="warning margin">
            El usuario o contraseña ingresados son incorrectos. <br>Por favor verificá los datos.
        </p>
        <?php } ?>
        <div>
            <a class="left margin" href="account">Registrarme</a>
            <button class="right btn waves-effect waves-light margin" type="submit" name="action">
                Ingresar
            </button>
        </div>

</form>
