<div class="container">
    <div class="section contact">

        <div class="row">
            <form class="col s12 l8 offset-l2" method="post" action="/controllers/contact.php">
                <div class="contact--title">
                    <h4>Contacto</h4><hr />
                    <p>
                        Si tenés alguna inquietud o consulta escribinos a la siguiente dirección de correo o completá
                        el formulario y nos pondremos en contacto a la brevedad.
                    </p>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" required type="text" class="validate" name="name">
                        <label for="first_name">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" required type="text" class="validate" name="lastname">
                        <label for="last_name">Apellido</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" required type="email" class="validate" name="email">
                        <label for="email">Email</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" required class="materialize-textarea" name="msg"></textarea>
                        <label for="textarea1">Consulta</label>
                    </div>
                </div>

                <button class="right btn waves-effect waves-light" type="submit" name="action">
                    Enviar
                </button>
            </form>
        </div>

    </div>
</div>
