<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
    Use \App\System\Helpers\DateHelper as DateHelper;
 ?>

<div class="notice">
    <div class="notice--wrapper">
        <?php $image = isset($new['image']) ? $new['image'] : "uploads/news/4XdY39Fvlt6BGgQ.jpg"; ?>
        <img class="notice--image" src="<?php echo $image ?>" alt="notice 1">
    </div>

    <div class="notice--header">
        <h1 class="notice--header-title"><?php echo $new['title'] ?></h1>
    </div>

    <div class="notice--description">

        <a class="notice--description-button" href="/news/<?php echo $new['id']; ?>">
            <span class="description-button-text">></span>
        </a>

        <span class="author-wrapper">
            <a class"author-wrapper--image">
                <?php if ($new['author-image']) { ?>
                    <img class="author-wrapper--image-avatar" src="<?php echo $new['author-image'] ?>" />
                <?php } else { ?>
                    <img class="author-wrapper--image-avatar" src="/sources/photos/default.png" />
                <?php } ?>
            </a>
            <a class="author-wrapper--text"><?php echo $new['author'] ?></a>
        </span>

        <span class="post-on-wrapper">
            <a class="post-on-wrapper--text"><?php echo DateHelper::formatDateES($new['created_at']) ?></a>
        </span>

    </div>

    <div class="notice--text">
        <p>
            <?php echo $new['intro_text']; ?>
        </p>
    </div>


</div>
