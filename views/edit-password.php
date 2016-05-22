<?php
    $message_success = 'Contraseña actualizada con éxito';
    $message_error = 'La contraseña ingresada es incorrecta';
 ?>

<div class="row profile--form">
    <span class="profile--form-title">Cambiar contraseña</span>
    <form class="col s12 profile--form" method="post" action="/controllers/change.password.php">
        <div class="row profile--form-row">
            <div class="input-field col s12 profile--form-row-element">
                <input id="old_password" type="password" class="validate" name="old_password1" required="required">
                <label for="old_password">Contraseña anterior</label>
            </div>
        </div>

        <div class="row profile--form-row">
            <div class="input-field col s6 profile--form-row-element">
                <input id="password" type="password" class="validate" name="password_new" required="required">
                <label for="password">Nueva contraseña</label>
            </div>

            <div class="input-field col s6 profile--form-row-element">
                <input id="repeat-password" type="password" class="validate" name="password_repeat" required="required">
                <label for="repeat-password">Repetir Contraseña Nueva</label>
            </div>
        </div>
        <div class="row profile--form-row">
            <div class="col right">
                <button class="btn waves-effect waves-light profile--form-row-element-button" type="submit" name="action">
                    Guardar
                </button>
            </div>
        </div>
    </form>
</div>
