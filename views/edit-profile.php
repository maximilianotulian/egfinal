<div class="row profile--form">
    <div class="col s12">
        <div class="row">
            <span class="profile--form-title">Perfil</span>
            <form class="col s12 profile--form">

                <div class="row profile--form-row">
                    <div class="input-field col s6 profile--form-row-element">
                        <input id="first_name" type="text" class="validate" name="name" required="required">
                        <label for="first_name">Nombre</label>
                    </div>

                    <div class="input-field col s6 profile--form-row-element">
                        <input id="last_name" type="text" class="validate" name="lastname" required="required">
                        <label for="last_name">Apellido</label>
                    </div>
                </div>

                <div class="row profile--form-row">
                    <div class="input-field col s12 l6 profile--form-row-element">
                        <input id="username" type="text" class="validate" name="username" required="required" title="Por favor ingrese su usuario">
                        <label for="username">Usuario</label>
                    </div>
                    <div class="col s12 l6 file-field input-field">
                        <div class="btn waves-effect waves-light profile--form-row-element-button">
                            <span>Foto</span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>

                <div class="row profile--form-row">
                    <div class="input-field col s12 profile--form-row-element">
                        <textarea id="biography" class="materialize-textarea no-padding"></textarea>
                        <label for="biography">Biografia</label>
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
