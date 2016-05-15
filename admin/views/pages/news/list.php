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
        <th data-field="id">Titulo</th>
        <th data-field="name">Subtitulo</th>
        <th data-field="price">Descripcion Corta</th>
        <?php if(UserHelper::loggedUserHasPermission(Permissions::SEE_ALL_NEWS)) {?>
            <th data-field="author">Autor</th>
        <?php } ?>
        <th data-field="actions"></th>
    </tr>
  </thead>

  <tbody>
        <?php
            foreach ($news as $key => $new) {
                if ($new['id_user'] === $loggedUser['id'] || UserHelper::loggedUserHasPermission(Permissions::SEE_ALL_NEWS)) {
                    ?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $new['title'] ?></td>
                            <td><?php echo $new['subtitle'] ?></td>
                            <td><?php echo $new['intro_text'] ?></td>
                            <?php if(UserHelper::loggedUserHasPermission(Permissions::SEE_ALL_NEWS)) {?>
                                <td><?php echo $new['author'] ?></td>
                            <?php } ?>
                            <td>
                                <?php if (UserHelper::loggedUserHasPermission(Permissions::EDIT_NEWS)) {?>
                                    <a href="/admin/news/<?php echo $new['id']; ?>"><i class="material-icons">mode_edit</i></a>
                                <?php } ?>
                                <?php if (UserHelper::loggedUserHasPermission(Permissions::DELETE_NEWS)) {?>
                                    <a href="/admin/news/delete/<?php echo $new['id']; ?>"><i class="material-icons">delete</i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                }
            }
         ?>
  </tbody>
</table>
