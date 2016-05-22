<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/NewsRepository.php';
    Use \App\System\Repositories\NewsRepository as NewsRepository;
    $newsRepository = new NewsRepository();
    $news = $newsRepository->getHomeNews();

 ?>

<div class="home home--baner banner--container">

    <?php $backgroundName="background2"; ?>
    <div class="banner" style="background-image: url(<?php echo '/sources/photos/'.$backgroundName.'.jpg'; ?>);" >

        <div class="section">
            <div class="container">
                <br><br>
                <h1 class="banner--title">Portal para entornos educativos</h1>
                <br><br>
            </div>
        </div>
    </div>
</div>

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

<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text">
                        <i class="icon material-icons">flash_on</i>
                    </h2>
                    <h5 class="center">Mision</h5>

                    <p class="light">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text">
                        <i class="icon material-icons">group</i>
                    </h2>
                    <h5 class="center">Vision</h5>

                    <p class="light">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text">
                        <i class="icon material-icons">settings</i>
                    </h2>
                    <h5 class="center">Valores</h5>

                    <p class="light">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
