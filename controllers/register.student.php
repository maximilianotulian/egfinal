<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/UserRepository.php';
    Use \App\System\Repositories\UserRepository as UserRepository;

    if (isset($_GET['subject_id']) && isset($_GET['student_id']) ){
        $userRepository = new UserRepository();
        $userRepository->asignStudentToSubject($_GET['student_id'], $_GET['subject_id']);
        header('Location: /subjects/'.$_GET['subject_id']);
        die();
    }else{
        header('Location: /subjects/'.$_GET['subject_id']);
        die();
    }

 ?>
