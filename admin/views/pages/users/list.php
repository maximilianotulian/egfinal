<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;

    $loggedUser = UserHelper::getLoggedUser();

 ?>

<table>
  <thead>
    <tr>
        <th></th>
        <th data-field="username">Usuario</th>
        <th data-field="name">Nombre</th>
        <th data-field="price">Rol</th>
        <th data-field="actions"></th>
    </tr>
  </thead>

  <tbody>
        <?php
            foreach ($users as $key => $user) {
                ?>
                    <tr>
                        <form method="post">
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['name'] . ' ' . $user['lastname'] ?></td>
                            <td>
                                <?php echo $user['role'][0]['description'] ?>
                            </td>
                            <td>
                                <?php if ($loggedUser['id'] !== $user['id']) { ?>
                                    <a href="/admin/users/<?php echo $user['id']; ?>"><i class="material-icons">mode_edit</i></a>
                                    <a href="/admin/users/delete/<?php echo $user['id']; ?>"><i class="material-icons">delete</i></a>
                                <?php } ?>
                            </td>
                        </form>
                    </tr>
                <?php
            }
         ?>
  </tbody>
</table>
