<div class="row">
    <span class="profile--form-title">Cambiar contraseña</span>
    <form class="col s12 profile--form">

        <div class="row profile--form-row">
            <div class="input-field col s12 profile--form-row-element">
                <input id="email" type="email" class="validate" name="email" required="required">
                <label for="email">Email</label>
            </div>
        </div>

        <div class="row profile--form-row">
            <div class="input-field col s6 profile--form-row-element">
                <input id="password" type="password" class="validate" name="password" required="required">
                <label for="password">Nueva contraseña</label>
            </div>

            <div class="input-field col s6 profile--form-row-element">
                <input id="repeat-password" type="password" class="validate" name="password_repeat" required="required">
                <label for="repeat-password">Repetir Contraseña</label>
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
