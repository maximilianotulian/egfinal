<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/FilesRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Repositories\FilesRepository as FilesRepository;
    $file = (isset($_GET['file']) ? $_GET['file'] : null);
    $delete = (isset($_GET['action']) ? $_GET['action'] : null);
    if(!UserHelper::loggedUserHasPermission(Permissions::LIST_FILES)){
        header('Location: /admin/');
    }else{
        $loggedUser = UserHelper::getLoggedUser();
        $filesRepository = new FilesRepository();
        if($delete){
            $filesRepository->delete($file);
        }
        $files = $filesRepository->getAll();
        if ($file != null && !$delete){
            include 'edit.php';
        }else{
            include 'list.php';
            if(UserHelper::loggedUserHasPermission(Permissions::ADD_FILES)){
                ?>
                <a href="/admin/files/0" class="waves-effect waves-light btn"><i class="material-icons left">note_add</i>Agregar archivos</a>
                <?php
            }
        }
    }
 ?>
