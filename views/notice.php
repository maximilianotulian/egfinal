<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
    Use \App\System\Helpers\DateHelper as DateHelper;
 ?>


<div class="news--notices container">
    <div class="section">
        <div class="row">

            <div>
                <div class="notice-complete col s12 m8 offset-m2">

                    <div class="col s12 m12">
                        <h3 class="notice-complete--title">
                            <?php echo $foundNew['title']; ?>
                        </h3>
                        <h4 class="notice-complete--author"><i>Por <?php echo $foundNew['author'] ?></i> - <?php echo DateHelper::formatDateES($foundNew['created_at']) ?></h4>
                    </div>

                    <div class="notice-complete--description col s12 m8">
                        <p><?php echo $foundNew['intro_text'] ?></p>
                        <p><?php echo $foundNew['full_text'] ?></p>
                    </div>

                    <div class="col s12 m4">
                        <img class="notice-complete--image" alt="250x300 image" src="<?php echo $foundNew['image'] ?>" />
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
