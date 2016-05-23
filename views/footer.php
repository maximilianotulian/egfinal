<footer class="page-footer teal">
  <div class="container">
    <div class="row">

      <div class="col l12 s12">
        <h5 class="white-text">Mapa del sitio</h5>
        <ul class="footer--list">
          <li><a class="footer--list-item" href="#!">Inicio</a></li>
          <li><a class="footer--list-item" href="#!">Noticias</a></li>
          <li><a class="footer--list-item" href="#!">Sobre Nosotros</a></li>
          <li><a class="footer--list-item" href="#!">Contacto</a></li>
          <li><a class="footer--list-item" href="#!">Ingresar</a></li>
        </ul>
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
