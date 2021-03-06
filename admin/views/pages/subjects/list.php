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
        <th data-field="id">Título</th>
        <th data-field="subject">Profesores</th>
        <th data-field="actions"></th>
    </tr>
  </thead>

  <tbody>
        <?php
            foreach ($subjects as $key => $subject) {
                ?>
                    <?php if (UserHelper::loggedUserHasPermission(Permissions::SEE_ALL_SUBJECTS) || $subjectRepository->isTeacherOf($subject['id'], $loggedUser['id'])) {  ?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $subject['title'] ?></td>
                            <td>
                                <?php
                                    $teacherList = '';
                                    foreach ($subjectRepository->getTeachers($subject['id']) as $key => $teachers) {
                                    $teacherList .= $teachers['name'] . ' ' . $teachers['lastname'] . ', ';
                                    }
                                    echo rtrim($teacherList, ", ");
                                ?>
                            </td>
                            <td>
                            <?php if (UserHelper::loggedUserHasPermission(Permissions::EDIT_SUBJECT) || UserHelper::loggedUserHasPermission(Permissions::ACCEPT_STUDENTS)) {?>
                                <a href="/admin/subjects/<?php echo $subject['id']; ?>"><i class="material-icons">mode_edit</i></a>
                            <?php } ?>
                            <?php if (UserHelper::loggedUserHasPermission(Permissions::DELETE_SUBJECT)) {?>
                                <a href="/admin/subjects/delete/<?php echo $subject['id']; ?>"><i class="material-icons">delete</i></a>
                            <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php
            }
         ?>
  </tbody>
</table>
