<?php

    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/NewsRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
    Use \App\System\Repositories\NewsRepository as NewsRepository;
    Use \App\System\Helpers\DateHelper as DateHelper;

    $newsRepository = new NewsRepository();
    $news = $newsRepository->getAll();

    $new = (isset($_GET['new_id']) ? $_GET['new_id'] : null);
    if($new !== null){
        $foundNew = $newsRepository->getById($new)[0];        
    }


 ?>

<!-- news section -->
<?php
    if($new === null){
 ?>
     <!-- banner section -->
     <div class="news news--baner banner--container">
         <?php $backgroundName="background2"; ?>
         <div class="banner" style="background-image: url(<?php echo '/sources/photos/'.$backgroundName.'.jpg'; ?>);" >

             <div class="section">
                 <div class="container">
                     <br><br>
                     <h1 class="banner--title">Lorem ipsum</h1>
                     <div class="row center">
                         <h5 class="banner--subtitle col s12 light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h5>
                     </div>
                     <br><br>
                 </div>
             </div>
         </div>
     </div>

     <!-- end banner section -->
    <div class="news--notices container">
        <div class="section">
            <div class="row">
                <?php
                    foreach ($news as $key => $new) {
                        ?>
                        <div class="col s12 m4">
                            <?php include 'new.php'; ?>
                        </div>
                        <?php
                    }
                 ?>
            </div>
        </div>
    </div>
<?php } else { include 'notice.php'; }?>
<!-- end news section -->
