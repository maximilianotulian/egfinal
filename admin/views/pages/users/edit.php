<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/NewsRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Repositories\UserRepository as UserRepository;

    if ($user){
        $user = $userRepository->getById($user)[0];
    }

    $roles = $userRepository->getAllRoles();

    if (isset($_POST['id_role'])){
        if($_POST['id_role'] !== 0){
            $userRepository->updateUserRole($_POST['user_id'], $_POST['id_role']);
            header('Location: /admin/users');
        }
    }

 ?>


<div class="row">
    <div class="col s8">
        <div class="row">
          <form class="col s12" method="post">
              <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
            <div class="row">
              <div class="input-field col s12">
                  <input id="title" type="text" class="validate" name="title" readonly="true" value="<?php echo $user['username'] ?>">
                  <label for="title">Usuario</label>
              </div>
            </div>
            <div class="input-field col s12">
              <select name="id_role">
                <option value="0" disabled selected>Rol</option>
                <?php
                    foreach ($roles as $key => $role) {
                        ?>
                            <option <?php if ($user['role'][0]['id'] ===  $role['id']) echo 'selected="selected"' ?>value="<?php echo $role['id']; ?>"><?php echo $role['description']; ?></option>
                        <?php
                    }
                 ?>
              </select>
              <label>Rol del usuario</label>
            </div>

            <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Guardar</button>
          </form>
        </div>
    </div>
</div>
