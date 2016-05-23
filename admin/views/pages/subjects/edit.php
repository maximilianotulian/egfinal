<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/SubjectRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/FileUpload.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/UserRepository.php';

    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\FileUpload as FileUpload;
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Repositories\SubjectRepository as SubjectRepository;
    Use \App\System\Repositories\UserRepository as UserRepository;

    $subjectRepository = new SubjectRepository();
    $loggedUser = UserHelper::getLoggedUser();

    $userRepository = new UserRepository();
    $teachers = $userRepository->getAllTeachers();

    $editSubject = array(
        'title' => '',
        'description' => '',
    );

    if ($subject){
        $editSubject = $subjectRepository->getById($subject)[0];
        $subject_teachers = $subjectRepository->getTeachers($subject);
        $students = $subjectRepository->getStudents($subject);
    }



    if (isset($_POST['description']) && isset($_POST['title']) ){
        $editSubject = array(
            'title' => $_POST['title'],
            'description' => $_POST['description']
        );
        if (isset($subject) && $subject != 0){
            $editSubject['id'] = $subject;
            $subjectRepository->update($editSubject);
            header('Location: /admin/subjects');
        }else{
            $subjectRepository->add($editSubject);
            header('Location: /admin/subjects');
        }

    }

 ?>


<div class="row">
    <div class="col s8">
        <div class="row">
          <form class="col s12" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="title"
                    <?php if (!UserHelper::loggedUserHasPermission(Permissions::EDIT_SUBJECT)) { echo 'disabled'; } ?>
                    type="text" class="validate" name="title" value="<?php echo $editSubject['title'] ?>">
                    <label for="title">Título</label>
                </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                  <input id="title"
                  <?php if (!UserHelper::loggedUserHasPermission(Permissions::EDIT_SUBJECT)) { echo 'disabled'; } ?>
                  type="text" class="validate" name="description" value="<?php echo $editSubject['description'] ?>">
                  <label for="title">Descripción</label>
              </div>
            </div>
            <?php if (isset($subject) && $subject != 0){ ?>
                <div class="row valign-wrapper">
                    <div class="input-field col s9 valign">
                      <select
                      <?php if (!UserHelper::loggedUserHasPermission(Permissions::EDIT_SUBJECT)) { echo 'disabled'; } ?>
                      class="teacher-selector">
                        <option value="" disabled selected>Profesor</option>
                        <?php foreach ($teachers as $key => $teacher) {?>
                            <?php if (!$subjectRepository->isTeacherOf($editSubject['id'], $teacher['id_user'])) {?>
                            <option value="<?php echo $teacher['id_user'] ?>"><?php echo $teacher['name'] . ' ' . $teacher['lastname'] ?></option>
                            <?php }?>
                        <?php }?>
                      </select>
                      <label>Profesores</label>
                    </div>
                    <div class="col s3 valign">
                        <?php if (UserHelper::loggedUserHasPermission(Permissions::EDIT_SUBJECT)) { ?>
                            <a data-subject="<?php echo $editSubject['id'] ?>" class="waves-effect waves-light btn asign-teacher-button" href="#" class="waves-effect waves-light btn ">Asignar</a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Guardar</button>
          </form>
        </div>
        <?php if (isset($subject) && $subject != 0){ ?>
            <ul class="collection with-header">
                <li class="collection-header"><h4>Profesores</h4></li>
                <?php foreach ($subject_teachers as $key => $teacher) { ?>
                    <li class="collection-item">
                        <div>
                            <?php echo $teacher['name'] . ' ' . $teacher['lastname']; ?>
                            <?php if (UserHelper::loggedUserHasPermission(Permissions::EDIT_SUBJECT)) { ?>
                                <a href="/admin/controllers/remove.teacher.php?id_subject=<?php echo $editSubject['id']?>&id_teacher=<?php echo $teacher['id']?>"
                                   class="secondary-content"><i class="material-icons">delete</i></a>
                                <?php } ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <ul class="collection with-header">
                <li class="collection-header"><h4>Alumnos</h4></li>
                <?php foreach ($students as $key => $student) { ?>
                    <li class="collection-item">
                        <div>
                            <?php echo $student['name'] . ' ' . $student['lastname']; ?>
                            <?php if (UserHelper::loggedUserHasPermission(Permissions::ACCEPT_STUDENTS)) { ?>
                                <?php if($student['active']) {?>
                                    <a title="Borrar Alumno" href="/admin/controllers/remove.teacher.php?id_subject=<?php echo $editSubject['id']?>&id_teacher=<?php echo $student['id']?>"
                                       class="secondary-content"><i class="material-icons">delete</i></a>
                                <?php } else { ?>
                                    <a title="Habilitar Alumno" href="/admin/controllers/active.student.php?id_subject=<?php echo $editSubject['id']?>&id_student=<?php echo $student['id']?>"
                                       class="secondary-content"><i class="material-icons">done</i></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>

</div>
