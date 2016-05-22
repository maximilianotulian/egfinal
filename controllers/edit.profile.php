<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/UserRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    Use \App\System\Repositories\UserRepository as UserRepository;
    Use \App\System\Helpers\UserHelper as UserHelper;

    $loggedUser = UserHelper::getLoggedUser();
    $userRepository = new UserRepository();

    $updatedUser = array(
        'id' => $loggedUser['id'],
        'address' => (isset($_POST['address'])) ? $_POST['address'] : '',
        'telephone' => (isset($_POST['telephone'])) ? $_POST['telephone'] : '',
        'webpage' => (isset($_POST['webpage'])) ? $_POST['webpage'] : '',
        'biography' => (isset($_POST['biography'])) ? $_POST['biography'] : ''
    );

    $userRepository->update($updatedUser);
    UserHelper::updateLoggedUser();
    header('Location: /profile/');

 ?>
