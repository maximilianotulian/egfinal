<?php

include_once 'system/utils/UserHelper.php';
include_once 'system/utils/Permissions.php';
Use \App\System\Helpers\UserHelper as UserHelper;
Use \App\System\Helpers\Permissions as Permissions;

$loggedUser = UserHelper::getLoggedUser();

?>

<footer class="page-footer footer teal">
    <div class="container">
        <div class="row">

            <div class="col l12 s12">

                <div class="col l4">
                    <h5>Inicio</h5>
                    <ul class="footer--list">
                        <?php if($loggedUser) { ?>
                        <li><a class="footer--list-item" href="/subjects">Catedras</a></li>
                        <?php } ?>
                        <li>
                            <a class="footer--list-item" href="/home">Inicio</a>
                            <a class="footer--list-item" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fportaleducativo.tigrimigri.com%2F">
                                - Validación W3C.
                            </a>
                        </li>
                        <li>
                            <a class="footer--list-item" href="/contact">Contacto</a>
                            <a class="footer--list-item" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fportaleducativo.tigrimigri.com%2Fcontact">
                                - Validación W3C.
                            </a>
                        </li>
                        <li>
                            <a class="footer--list-item" href="/us">Nosotros</a>
                            <a class="footer--list-item" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fportaleducativo.tigrimigri.com%2Fus">
                                - Validación W3C.
                            </a>
                        </li>
                        <li>
                            <a class="footer--list-item" href="/news">Noticias</a>
                            <a class="footer--list-item" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fportaleducativo.tigrimigri.com%2Fnews">
                                - Validación W3C.
                            </a>
                        </li>
                        <li>
                            <a class="footer--list-item" href="/account">Registrar</a>
                            <a class="footer--list-item" href="http://portaleducativo.tigrimigri.com/account">
                                - Validación W3C.
                            </a>
                        </li>
                        <li>
                            <a class="footer--list-item modal-trigger" href="#login-modal">Ingresar</a>
                            <a class="footer--list-item" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fportaleducativo.tigrimigri.com%2Fhome%23login-modal">
                                - Validación W3C.
                            </a>
                        </li>
                    </ul>
                </div>
                <?php if($loggedUser) {?>
                <div class="col l4">
                    <h5>Perfil</h5>
                    <ul class="footer--list">
                        <ul>
                            <li><a class="footer--list-item" href="/profile">Actualizar Perfil</a></li>
                            <li><a class="footer--list-item" href="/profile/password">Cambiar Contraseña</a></li>
                            <li><a class="footer--list-item" href="/profile/subjects">Mis Catedras</a></li>
                        </ul>
                    </ul>
                </div>

                <?php if (UserHelper::loggedUserHasPermission(Permissions::ADMIN_ACCESS)){ ?>

                <div class="col l4">
                    <h5>Administrador</h5>
                    <ul class="footer--list">
                        <?php if (UserHelper::loggedUserHasPermission(Permissions::LIST_NEWS)){ ?>
                            <li><a class="footer--list-item" href="/admin/news">Noticias</a></li>
                        <?php } ?>
                        <?php if (UserHelper::loggedUserHasPermission(Permissions::LIST_SUBJECTS)){ ?>
                        <li><a class="footer--list-item" href="/admin/subjects">Catedras</a></li>
                        <?php } ?>
                        <?php if (UserHelper::loggedUserHasPermission(Permissions::LIST_FILES)){ ?>
                        <li><a class="footer--list-item" href="/admin/files">Archivos</a></li>
                        <?php } ?>
                        <?php if (UserHelper::loggedUserHasPermission(Permissions::EDIT_USERS)){ ?>
                        <li><a class="footer--list-item" href="/admin/users">Usuarios</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php }}?>

            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <p class="center">Final Entornos gráficos - Alumnos: Joaquin Diaz, Cristian Ruiz, Maximiliano Tulian.</p>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
<script type="text/javascript" src="/sources/js/app.js"></script>

</body>
</html>

<?php if (isset($_GET['success'])) { ?>
    <?php if($_GET['success'] === 'true') {?>
        <script type="text/javascript">
        $(document).ready(function(){
            Materialize.toast('<?php echo $message_success; ?>', 4000);
        });
        </script>
        <?php } else { print_r('asf');?>
        <script type="text/javascript">
        $(document).ready(function(){
            Materialize.toast('<?php echo $message_error; ?>', 4000);
        })
        </script>
        <?php } ?>
        <?php } ?>
        <?php if (isset($_GET['bad_login'])) { ?>
            <script type="text/javascript">
            $('#login-modal').openModal();
            </script>
            <?php } ?>
