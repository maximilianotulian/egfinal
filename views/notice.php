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
                        <h4 class="notice-complete--title">
                            <?php echo $foundNew['title']; ?>
                        </h4> <hr />
                        <h5 class="notice-complete--author"><i>Por <?php echo $foundNew['author'] ?></i> - <?php echo DateHelper::formatDateES($foundNew['created_at']) ?></h4>
                    </div>

                    <div class="notice-complete--description col s12">
                        <p><?php echo $foundNew['intro_text'] ?></p>

                        <img class="notice-complete--image" alt="<?php echo $foundNew['title']; ?>" src="<?php echo $foundNew['image'] ?>" />

                        <p><?php echo $foundNew['full_text'] ?></p>

                        <ul class="notice--social-media col s12 m8">
                            <li class="social-icon--item">
                                <?php $pagina_actual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>

                                <a class="social-icon--link" onclick="javascript:window.open(this.href, '',
                                'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
                                href="https://facebook.com/sharer/sharer.php?u=<?php echo $pagina_actual; ?>">

                                    <span class="genericon genericon-facebook social-icon social-icon_facebook">
                                        <span class="social-icon--description">Facebook</span>
                                    </span>
                                </a>
                            </li>

                            <li class="social-icon--item">

                                <a class="social-icon--link" onclick="javascript:window.open(this.href,
                                '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
                                href="http://twitter.com/home?status=News News: <?php echo $pagina_actual; ?>">

                                    <span class="genericon genericon-twitter social-icon social-icon_twitter">
                                        <span class="social-icon--description">Twitter</span>
                                    </span>
                                </a>
                            </li>

                            <li class="social-icon--item">

                                <a class="social-icon--link" onclick="javascript:window.open(this.href, '',
                                'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
                                href="https://plus.google.com/share?url=<?php echo $pagina_actual; ?>">

                                    <span class="genericon genericon-googleplus social-icon social-icon_google-plus">
                                        <span class="social-icon--description">Google Plus</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col l12">
                        <?php
                        if($loggedUser){
                            ?>
                            <h4>Dejá tu comentario</h4>
                            <div class="new-comment">
                                <div class="row">
                                    <form method="post" action="/controllers/comments.php" class="col s10 offset-s1">
                                        <div class="row">
                                            <div class="input-field col s12 no-padding">
                                                <textarea id="comment" class="materialize-textarea no-padding" required="required" name="comment"></textarea>
                                                <label for="comment">Comentario</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_user" value="<?php echo $loggedUser['id'] ?>">
                                        <input type="hidden" name="id_new" value="<?php echo $foundNew['id'] ?>">
                                        <button class="right btn waves-effect waves-light" type="submit" name="action">
                                            Enviar
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

                </div>


            </div>
        </div>
    </div>
</div>
