<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/SubjectRepository.php';

    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Repositories\SubjectRepository as SubjectRepository;

    $loggedUser = UserHelper::getLoggedUser();
    $subjectRepository = new SubjectRepository();
    $subjects = $subjectRepository->getAll();

    $subject_id = (isset($_GET['subject_id'])) ? $_GET['subject_id'] : null;
 ?>

    <?php if (!$subject_id) { ?>
        <div class="subjects container">
            <div class="section">
                <div class="row subjects--wrapper">
                    <div class="col s12 l8 offset-l2">

                            <div class="subjects--title">
                                <h4>Catedras</h4><hr />
                                <p>
                                    En este espacio podra consultar y/o suscribirse a las catedras.                                </p>
                            </div>

                            <div class="subjects--list-wrapper">
                                <ul class="subjects--list collection">
                                    <?php foreach($subjects as $subject) {?>
                                        <li class="subjects--list-item collection-item">
                                            <a class="black-text" href="/subjects/<?php echo $subject['id'] ?>"><?php echo $subject['title'] ?></a>
                                        </li>
                                    <?php  }?>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
        $subject = $subjectRepository->getById($subject_id)[0];
        include 'subject.php';
        ?>
    <?php } ?>
