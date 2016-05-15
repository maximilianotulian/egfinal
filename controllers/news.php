<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/NewsRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Repositories\NewsRepository as NewsRepository;

    $new = (isset($_GET['new']) ? $_GET['new'] : null);
    $delete = (isset($_GET['action']) ? $_GET['action'] : null);

    if(!UserHelper::loggedUserHasPermission(Permissions::LIST_NEWS)){
        header('Location: /admin/');
    }else{
        $loggedUser = UserHelper::getLoggedUser();
        $newsRepository = new NewsRepository();

        if($delete){
            $newsRepository->delete($new);
        }

        $news = $newsRepository->getAll();
        if ($new != null && !$delete){
            include 'edit.php';
        }else{
            include 'list.php';
            if(UserHelper::loggedUserHasPermission(Permissions::ADD_NEWS)){
                ?>
                <a href="/admin/news/0" class="waves-effect waves-light btn"><i class="material-icons left">note_add</i>Agregar noticia</a>
                <?php
            }
        }
    }
 ?>
