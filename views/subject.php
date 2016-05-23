<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/SubjectRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/FilesRepository.php';

    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Repositories\SubjectRepository as SubjectRepository;
    Use \App\System\Repositories\FilesRepository as FilesRepository;

?>
<div class="subject container">
    <div class="section">
        <div class="row subject--wrapper">
            <div class="col s12 l8 offset-l2">

                <div class="subject--title">
                    <h4><?php echo $subject['title'] ?></h4>
                    <p>
                        <?php echo $subject['description'] ?>
                    </p>
                </div>

                <?php
                if(UserHelper::loggedUserHasPermission(Permissions::SEE_ALL_SUBJECTS)){
                    renderFiles($subject_id);
                } else {
                    if(UserHelper::loggedUserHasPermission(Permissions::IS_TEACHER)){
                        if (UserHelper::userHasSubject($loggedUser['id'], $subject_id)){
                            renderFiles($subject_id);
                        } else {
                            ?>
                                <div class="row">
                                    <span class="col s12 l9">
                                        Usted no es docente de esta materia, si esta información es incorrecta, por favor <a href="/contact">contáctese</a> con la administración.
                                    </span>
                                </div>
                            <?php
                        }
                    } else {
                        if (UserHelper::userHasSubject($loggedUser['id'], $subject_id, false)){
                            if(UserHelper::userHasSubject($loggedUser['id'], $subject_id, true)){
                                renderFiles($subject_id);
                            } else{
                                ?>
                                    <div class="row">
                                        <span class="col s12 l9">
                                            Su registro a la catedra está en revisión por los profesores.
                                        </span>
                                    </div>
                                <?php
                            }

                        } else {
                            ?>
                                <div class="row">
                                    <span class="col s12 l9">
                                        Para acceder al contenido debe estar registrado en la catedra
                                    </span>
                                    <a class="col s12 l3 right btn waves-effect waves-light margin"
                                    href="/controllers/register.student.php?student_id=<?php echo $loggedUser['id']?>&subject_id=<?php echo $subject_id ?>">
                                        registrarme
                                    </a>
                                </div>
                            <?php
                        }
                    }
                }
                 ?>
                <?php
                    function renderFiles($subject_id){
                        $filesRepository = new FilesRepository();
                        $files = $filesRepository->getAllBySubject($subject_id);
                        ?>
                            <div class="row">
                                <div class="col s12 l12">
                                    <div class="subject--list-wrapper">
                                        <h5>Archivos</h5>
                                        <ul class="subject--list collection">
                                            <?php foreach($files as $file) { ?>
                                                <li class="subject--list-item collection-item">
                                                    <a class="black-text" href="<?php echo $file['path'] ?>" download><?php echo $file['description'] ?></a>
                                                    <span class="black-text"> - <?php echo $file['author'] ?></span>
                                                </li>
                                            <?php  }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }

                 ?>
            </div>
        </div>
    </div>
</div>
