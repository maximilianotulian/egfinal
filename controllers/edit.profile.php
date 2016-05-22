<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/UserRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/FileUpload.php';
    Use \App\System\Repositories\UserRepository as UserRepository;
    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\FileUpload as FileUpload;

    $loggedUser = UserHelper::getLoggedUser();
    $userRepository = new UserRepository();

    $updatedUser = array(
        'id' => $loggedUser['id']
    );

    if (isset($_POST['address'])) $updatedUser['address'] = $_POST['address'];
    if (isset($_POST['telephone'])) $updatedUser['telephone']  = $_POST['telephone'];
    if (isset($_POST['telephone'])) $updatedUser['telephone']  = $_POST['telephone'];
    if (isset($_POST['webpage'])) $updatedUser['webpage']  = $_POST['webpage'];

    if(isset($_FILES['photo'])){
        if($_FILES['photo']['name'] != ''){
            $updatedUser['photo'] = FileUpload::uploadFile($_FILES["photo"], '/users/');
        }
    }

    $userRepository->update($updatedUser);
    UserHelper::updateLoggedUser();
    header('Location: /profile/');

 ?>
