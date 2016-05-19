<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/UserRepository.php';
    Use \App\System\Repositories\UserRepository as UserRepository;

    if (isset($_GET['id_subject']) && isset($_GET['id_teacher']) ){
        $userRepository = new UserRepository();
        $userRepository->asignTeacherToSubject($_GET['id_teacher'], $_GET['id_subject']);
        header('Location: /admin/subjects/'.$_GET['id_subject']);
        die();
    }else{
        header('Location: /admin/');
        die();
    }


 ?>
