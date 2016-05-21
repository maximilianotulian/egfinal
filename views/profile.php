<div class="profile container">
    <div class="row profile--wrapper">

        <div class="col s12 m4">
            <div class="row sidebar">
                <div class="options">
                    <ul class="options--list">
                        <li><a class="options--list-item" href="/#">Actualizar perfil</a></li>
                        <li><a class="options--list-item" href="/#">Cambiar contraseña</a></li>
                        <li><a class="options--list-item" href="/#">Deshabilitar cuenta</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col s12 m8">

            <div class="row profile--user">
                <div class="col s12">
                    <div class="user">
                        <img class="user--avatar" src="/sources/photos/default.png" />
                        <a class="user--avatar-text"><?php echo $loggedUser['name'] ?></a>
                    </div>
                </div>
            </div>

            <div class="row profile--form">
                <div class="col s10">
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
                    <div class="row">
                        <form class="col s12 profile--form">

                            <div class="row profile--form-row">
                                <p class="message center">Esta a punto de deshabilitar su cuenta</p>
                            </div>

                            <div class="row profile--form-row">
                                <div class="col l7 offset-l3">
                                    <button class="center btn waves-effect waves-light green profile--form-row-element-button" type="submit" name="action">
                                        Cancelar
                                    </button>

                                    <button class="right btn waves-effect waves-light red " type="submit" name="action">
                                        Aceptar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
