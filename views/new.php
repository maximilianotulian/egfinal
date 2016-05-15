<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
    Use \App\System\Helpers\DateHelper as DateHelper;
 ?>

<div class="notice">
    <div class="notice--wrapper">
        <img class="notice--image" src="<?php echo $new['image'] ?>" alt="notice 1">
    </div>

    <div class="notice--header">
        <h1 class="notice--header-title"><?php echo $new['title'] ?></h1>
    </div>

    <span class="post-on-wrapper">
        <a class="post-on-wrapper--text"><?php echo DateHelper::formatDateES($new['created_at']) ?></a>
    </span>

    <div class="notice--text">
        <p>
            <?php echo $new['intro_text']; ?>
        </p>
    </div>

    <div class="notice--description">

        <a class="notice--description-button">
            <span class="description-button-text">></span>
        </a>

        <span class="author-wrapper">
            <a class"author-wrapper--image">
                <img class="author-wrapper--image-avatar" src="http://0.gravatar.com/avatar/0eae3b79fc7792e26ca50d66dd76bfdc?s=50&d=monsterid&r=g" />
            </a>
            <a class="author-wrapper--text"><?php echo $new['author'] ?></a>
        </span>
    </div>
</div>
