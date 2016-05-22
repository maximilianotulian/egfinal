<?php
include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/CommentsRepository.php';

Use \App\System\Repositories\CommentsRepository as CommentsRepository;
Use \App\System\Helpers\DateHelper as DateHelper;
Use \App\System\Helpers\UserHelper as UserHelper;

$loggedUser = UserHelper::getLoggedUser();

$commentRepository = new CommentsRepository();
$comments = $commentRepository->getAllByNew($foundNew['id']);

?>


<div class="news--notices container">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="notice-complete col s12">
                    <div class="col s12 m12">
                        <h3 class="notice-complete--title">
                            <?php echo $foundNew['title']; ?>
                        </h3>
                        <h4 class="notice-complete--author"><i>Por <?php echo $foundNew['author'] ?></i> - <?php echo DateHelper::formatDateES($foundNew['created_at']) ?></h4>
                    </div>

                    <div class="notice-complete--description col s12">
                        <p><?php echo $foundNew['intro_text'] ?></p>

                        <img class="notice-complete--image" alt="<?php echo $foundNew['title']; ?>" src="<?php echo $foundNew['image'] ?>" />

                        <p><?php echo $foundNew['full_text'] ?></p>

                        <ul class="notice--social-media col s12 m8">
                            <li class="social-icon--item">
                                <a class="social-icon--link"  onclick="onIconCLick(this.href);" href="https://www.youtube.com/watch?v=F-7OFftB43w">
                                    <span class="genericon genericon-facebook social-icon social-icon_facebook">
                                        <span class="social-icon--description">Facebook</span>
                                    </span>
                                </a>
                            </li>
                            <li class="social-icon--item">
                                <a class="social-icon--link" href="#" onclick="onIconCLick">
                                    <span class="genericon genericon-twitter social-icon social-icon_twitter">
                                        <span class="social-icon--description">Twitter</span>
                                    </span>
                                </a>
                            </li>
                            <li class="social-icon--item">
                                <a class="social-icon--link" href="#" onclick="onIconCLick">
                                    <span class="genericon genericon-instagram social-icon social-icon_instagram">
                                        <span class="social-icon--description">Instagram</span>
                                    </span>
                                </a>
                            </li>
                            <li class="social-icon--item" onclick="onIconCLick">
                                <a class="social-icon--link" href="#">
                                    <span class="genericon genericon-linkedin social-icon social-icon_linkedin">
                                        <span class="social-icon--description">Linkedin</span>
                                    </span>
                                </a>
                            </li>
                            <li class="social-icon--item" onclick="onIconCLick">
                                <a class="social-icon--link" href="#">
                                    <span class="genericon genericon-googleplus social-icon social-icon_google-plus">
                                        <span class="social-icon--description">Google Plus</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container comentaries">
    <?php
    if($loggedUser){
        ?>
        <h3>Dejá tu comentario</h3>
        <div class="new-comment">
            <div class="row">
                <form method="post" action="/controllers/comments.php" class="col s10 offset-s1">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="comment" class="materialize-textarea" required="required" name="comment"></textarea>
                            <label for="comment">Comentario</label>
                        </div>
                    </div>
                    <input type="hidden" name="id_user" value="<?php echo $loggedUser['id'] ?>">
                    <input type="hidden" name="id_new" value="<?php echo $foundNew['id'] ?>">
                    <button class="right btn waves-effect waves-light" type="submit" name="action">
                        Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
        <?php
    } else {
        ?>
        <h3>Para poder dejar un comentario necesitás estar logeado.</h3>
        <?php } ?>
        <div class="comentaries">
            <!-- Comentarios -->
            <ul class="collection">
                <?php foreach ($comments as $key => $comment) {
                    ?>
                    <li class="collection-item avatar">
                        <?php if ($comment['author-image']) { ?>
                            <img class="image-avatar" src="<?php echo $comment['author-image'] ?>" />
                        <?php } else { ?>
                            <img class="mage-avatar" src="/sources/photos/default.png" />
                        <?php } ?>
                        <span class="title"><?php echo $comment['author']?> - <?php echo DateHelper::formatDateES($comment['created_at']) ?></span>
                        <p><?php echo $comment['comment'] ?></p>
                    </li>
                    <?php
                } ?>
            </ul>
        </div>
    </div>
