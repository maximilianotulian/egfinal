<div class="modal" id="login-modal">
    <form class="log-in" method="post" action="/controllers/login.php">
        <div class="modal-content">
            <div class="row margin">
                <div class="col l12">
                    <label for="username-modal">Usuario</label>
                    <input id="username-modal" type="text" class="validate" name="username" required="required">
                </div>
            </div>

            <div class="row margin">
                <span class="col l12">
                    <label for="password-modal">Contraseña</label>
                    <input id="password-modal" type="password" class="validate" name="password" required="required">
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
            <?php } ?>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col l12">
                    <div class="col s4 offset-s4">
                        <a class="right btn waves-effect waves-light margin log-in--button" href="account">
                            Registrarme
                        </a>
                    </div>
                    <div class="col s4">
                        <button class="right btn waves-effect waves-light margin" type="submit" name="action">
                            Ingresar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
