<?php
    $message_success = 'Perfil actualizado correctamente';
 ?>

<div class="row profile--form">
    <div class="col s12">
        <div class="row">
            <form class="col s12 profile--form" method="post" enctype="multipart/form-data" action="/controllers/edit.profile.php">
                <h4 >Perfil</h4>
                <div class="row profile--form-row">
                    <div class="input-field col s6 profile--form-row-element">
                        <input id="first_name" type="text" class="validate" name="name" disabled value="<?php echo $loggedUser['name']; ?>">
                        <label for="first_name">Nombre</label>
                    </div>

                    <div class="input-field col s6 profile--form-row-element">
                        <input id="last_name" type="text" class="validate" name="lastname" disabled value="<?php echo $loggedUser['lastname'] ?>">
                        <label for="last_name">Apellido</label>
                    </div>
                </div>

                <div class="row profile--form-row">
                    <div class="input-field col s12 l6 profile--form-row-element">
                        <input id="address" type="text" class="validate" name="address" value="<?php echo $loggedUser['address'] ?>">
                        <label for="address">Dirección</label>
                    </div>
                    <div class="col s12 l6 file-field input-field">
                        <div class="btn waves-effect waves-light profile--form-row-element-button">
                            <span>Foto</span>
                            <input type="file" name="photo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>

                <div class="row profile--form-row">
                    <div class="input-field col s6 profile--form-row-element">
                        <input id="phone" type="text" class="validate" name="telephone" value="<?php echo $loggedUser['telephone'] ?>" >
                        <label for="phone">Telefono</label>
                    </div>

                    <div class="input-field col s6 profile--form-row-element">
                        <input id="webPage" type="text" class="validate" name="webpage" value="<?php echo $loggedUser['webpage'] ?>" >
                        <label for="webPage">Pagina Web</label>
                    </div>
                </div>

                <div class="row profile--form-row">
                    <div class="input-field col s12 profile--form-row-element">
                        <textarea id="biography" class="materialize-textarea no-padding" name="biography"><?php echo $loggedUser['biography'] ?></textarea>
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
