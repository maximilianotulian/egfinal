<form class="log-in" method="post" action="/controllers/login.php">

    <div class="row margin">
        <div class="col l12">
            <label for="username">Usuario</label>
            <input id="username" type="text" class="validate" name="username" required="required">
        </div>
    </div>

    <div class="row margin">
        <span class="col l12">
            <label for="password">Contraseña</label>
            <input id="password" type="password" class="validate" name="password" required="required">
        </span>
    </div>

    <div class="row margin">
        <div class="col l12">
            <input type="checkbox" class="filled-in" id="filled-in-box" name="remember_me" value="true"/>
            <label for="filled-in-box">Recordarme</label>
        </div>
    </div>

    <?php if (isset($_GET['bad_login'])) { ?>
        <span class="warning margin-warning">El usuario o contraseña ingresados son incorrectos.</span>
        <br />
        <span class="warning margin-warning">Por favor verificá los datos.</span>
        <?php $newClass=1;} ?>
        <div class="row <?php echo (isset($newClass) ? null : 'extra-padding'); ?>">
            <div class="col l12">
                <a class="left btn waves-effect waves-light margin log-in--button" href="account">
                    Registrarme
                </a>
                <button class="right btn waves-effect waves-light margin" type="submit" name="action">
                    Ingresar
                </button>
            </div>
        </div>
</form>
