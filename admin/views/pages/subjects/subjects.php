<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/SubjectRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Repositories\SubjectRepository as SubjectRepository;
    $subject = (isset($_GET['subject']) ? $_GET['subject'] : null);
    $delete = (isset($_GET['action']) ? $_GET['action'] : null);
    if(!UserHelper::loggedUserHasPermission(Permissions::LIST_SUBJECTS)){
        header('Location: /admin/');
    }else{
        $loggedUser = UserHelper::getLoggedUser();
        $subjectRepository = new SubjectRepository();
        if($delete){
            $subjectRepository->delete($subject);
        }
        $subjects = $subjectRepository->getAll();
        if ($subject != null && !$delete){
            include 'edit.php';
        }else{
            include 'list.php';
            if(UserHelper::loggedUserHasPermission(Permissions::ADD_SUBJECT)){
                ?>
                <a href="/admin/subjects/0" class="waves-effect waves-light btn"><i class="material-icons left">note_add</i>Agregar materia</a>
                <?php
            }
        }
    }
 ?>
