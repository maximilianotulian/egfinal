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
    <div class="section no-padding">
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

<div class="news--notices container no-padding">
    <div class="section no-padding">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block home--block shadow">
                    <h5 class="center">Mision</h5>

                    <p class="light justify">
                        Nuestra Universidad tiene por finalidad la formación de graduados con un alto nivel de competencia profesional,
                        tanto en el campo del conocimiento como en el de su aplicación instrumental.
                        Se propone formar profesionales sólidos y creativos, capacitados para destacarse en un mundo crecientemente competitivo.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block home--block shadow">
                    <h5 class="center">Vision</h5>

                    <p class="light justify">
                        Somos una institución universitaria que ha alcanzado un respetable posicionamiento en la sociedad y
                        en el sistema educativo a nivel regional y nacional, incursionando activamente en los procesos de internacionalización
                        de la educación superior, que se distingue por su carácter innovador y flexible.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block home--block shadow">
                    <h5 class="center">Valores</h5>

                    <p class="light justify">
                        La Universidad propone formar graduados respetuosos del valor de la solidaridad y
                        éticamente comprometidos con el mejoramiento de la calidad de vida y con el desarrollo sostenible del país.
                        La formulación de principios se encuentra en estrecha vinculación con un núcleo de valores que promueve la institución.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
