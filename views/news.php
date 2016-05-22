<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/NewsRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Flags.php';

    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Repositories\NewsRepository as NewsRepository;
    Use \App\System\Helpers\DateHelper as DateHelper;
    Use \App\System\Helpers\Flags as Flags;

    $loggedUser = UserHelper::getLoggedUser();

    $newsRepository = new NewsRepository();
    $news = $newsRepository->getAll();

    $new = (isset($_GET['new_id']) ? $_GET['new_id'] : null);
    if($new !== null){
        $foundNew = $newsRepository->getById($new)[0];
        if (!$foundNew){
            $new = null;
        }
    }
 ?>

<!-- news section -->
<?php
    if($new === null){
 ?>
     <!-- end banner section -->
    <div class="news--notices container">
        <div class="section">
            <div class="row">
                <div class="col s12 l6 offset-l3">
                    <div class="news--title">
                        <h4>Noticias</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>


                <?php
                    foreach ($news as $key => $new) {
                        if ($new['type']['slug'] == Flags::PRIVATE) {
                            if($loggedUser){
                                ?>
                                    <div class="col s12 m4">
                                        <?php include 'new.php'; ?>
                                    </div>
                                <?php
                            }
                        } else if ($new['type']['slug'] == Flags::SUBJECT){
                            if (UserHelper::userHasSubject($loggedUser['id'], $new['subject']['id'])){
                                ?>
                                    <div class="col s12 m4">
                                        <?php include 'new.php'; ?>
                                    </div>
                                <?php
                            }
                        } else {
                            ?>
                                <div class="col s12 m4">
                                    <?php include 'new.php'; ?>
                                </div>
                            <?php
                        }
                    }
                 ?>
            </div>
        </div>
    </div>
<?php } else { include 'notice.php'; }?>
<!-- end news section -->
