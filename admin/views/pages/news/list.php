<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;
 ?>

<table>
  <thead>
    <tr>
        <th></th>
        <th data-field="id">Titulo</th>
        <th data-field="name">Subtitulo</th>
        <th data-field="price">Descripcion Corta</th>
        <th data-field="author">Autor</th>
        <th data-field="actions"></th>
    </tr>
  </thead>

  <tbody>
        <?php
            foreach ($news as $key => $new) {
                ?>
                    <tr>
                        <td><?php echo $key ?></td>
                        <td><?php echo $new['title'] ?></td>
                        <td><?php echo $new['subtitle'] ?></td>
                        <td><?php echo $new['intro_text'] ?></td>
                        <td><?php echo $new['author'] ?></td>
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
         ?>
  </tbody>
</table>
