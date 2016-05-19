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
        <th data-field="id">Descripción</th>
        <th data-field="name">Archivo</th>
        <?php if(UserHelper::loggedUserHasPermission(Permissions::SEE_ALL_FILES)) {?>
                <th data-field="name">Autor</th>
        <?php } ?>
        <th data-field="name">Materia</th>
        <th data-field="actions"></th>
    </tr>
  </thead>

  <tbody>
        <?php
            foreach ($files as $key => $file) {
                if ($file['id_user'] === $loggedUser['id'] || UserHelper::loggedUserHasPermission(Permissions::SEE_ALL_FILES)) {
                    ?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $file['description'] ?></td>
                            <td><a href="<?php echo $file['path'] ?>">Descargar</a></td>
                            <?php if(UserHelper::loggedUserHasPermission(Permissions::SEE_ALL_FILES)) {?>
                                <td><?php echo $file['author'] ?></td>
                            <?php } ?>
                            <td><?php echo $file['subject'] ?></td>
                            <td>
                                <?php if (UserHelper::loggedUserHasPermission(Permissions::EDIT_FILES)) {?>
                                    <a href="/admin/files/<?php echo $file['id']; ?>"><i class="material-icons">mode_edit</i></a>
                                <?php } ?>
                                <?php if (UserHelper::loggedUserHasPermission(Permissions::DELETE_NEWS)) {?>
                                    <a href="/admin/files/delete/<?php echo $file['id']; ?>"><i class="material-icons">delete</i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                }
            }
         ?>
  </tbody>
</table>
