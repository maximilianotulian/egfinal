<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/UserRepository.php';
    Use \App\System\Repositories\UserRepository as UserRepository;

    if (isset($_GET['id_subject']) && isset($_GET['id_student']) ){
        $userRepository = new UserRepository();
        $userRepository->activeStudent($_GET['id_student'], $_GET['id_subject']);
        header('Location: /admin/subjects/'.$_GET['id_subject']);
        die();
    }else{
        header('Location: /admin/');
        die();
    }


 ?>
