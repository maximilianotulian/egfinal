<div class="row profile--form">
    <div class="col s12">
        <div class="row">
            <form class="col s12 profile--form" method="post" enctype="multipart/form-data" action="/controllers/edit.profile.php">
                <h4>Cambiar contraseña</h4><hr />
                <div class="row profile--form-row">
                    <div class="input-field col s12 profile--form-row-element">
                        <input id="old_password" type="text" class="validate" name="old_password">
                        <label for="old_password">Contraseña anterior</label>
                    </div>
                </div>

                <div class="row profile--form-row">
                    <div class="input-field col s12 l6 profile--form-row-element">
                        <input id="new_password" type="text" class="validate" name="new_password">
                        <label for="new_password">Contraseña nueva</label>
                    </div>
                    <div class="input-field col s12 l6 profile--form-row-element">
                        <input id="repeat_new_password" type="text" class="validate" name="repeat_new_password">
                        <label for="repeat_new_password">Repetir Contraseña nueva</label>
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
    </div>
</div>
