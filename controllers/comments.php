<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/CommentsRepository.php';

    Use \App\System\Repositories\CommentsRepository as CommentsRepository;

    if (isset($_POST['comment'])){
        $newComment = array(
            'id_user' => $_POST['id_user'],
            'id_new' => $_POST['id_new'],
            'comment' => $_POST['comment']
        );
        $commentRepository = new CommentsRepository();
        $commentRepository->add($newComment);
        header('Location: /news/'.$_POST['id_new']);
    }

 ?>
