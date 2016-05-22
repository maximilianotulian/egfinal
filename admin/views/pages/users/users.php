<h4>Usuarios</h4> <hr />
<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/NewsRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Repositories\UserRepository as UserRepository;

    $user = (isset($_GET['user']) ? $_GET['user'] : null);
    $delete = (isset($_GET['action']) ? $_GET['action'] : null);

    $loggedUser = UserHelper::getLoggedUser();

    if(!UserHelper::loggedUserHasPermission(Permissions::EDIT_USERS)){
        header('Location: /admin/');
    }else{
        $loggedUser = UserHelper::getLoggedUser();
        $userRepository = new UserRepository();

        if($delete){
            $userRepository->delete($user);
        }

        $users = $userRepository->getAll();

        if ($user != null && !$delete){
            include 'edit.php';
        }else{
            include 'list.php';
        }
    }
 ?>
