<!-- Modal Structure -->
<div id="modal-login" class="modal">
  <form method="post" action="login.php">
      <div class="modal-content">
        <h4>Login</h4>
        <div class="row">
            <div class="row">
             <div class="input-field col s12">
                <input id="last_name" type="text" name="username" class="validate">
                <label for="last_name">Usuario</label>
             </div>
              <div class="input-field col s12">
                <input id="last_name" type="password" name="password" class="validate">
                <label for="last_name">Contraseña</label>
              </div>
              <div class="input-field col s12">
                  <input type="checkbox" class="filled-in" id="filled-in-box" name="remember_me"checked="checked" />
                  <label for="filled-in-box">Recordarme</label>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Login</button>
      </div>
  </form>
</div>
