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
                <div class="row center">
                    <h5 class="banner--subtitle col s12 light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h5>
                </div>
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

<div class="proyect container">
    <div class="section">
        <div class="row">
            <div class="col s12">
                <h4>SOBRE EL PROYECTO</h4>
                <img src="/sources/photos/Logo_Portal.png" alt="Portal Educativo" class="logo"/>
                <p>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                </p>
            </div>
            <div class="col s12 tecnologies">
                <h4>TECNOLOGÍAS UTILIZADAS</h4>
                <div class="row">
                    <div class="col s4 tecnologie">
                        <h5>PHP</h5>
                        <div class="image-wrapper">
                            <img src="/sources/photos/tecnologies/php.png" alt="PHP " />
                        </div>
                        <p>
                            PHP es un lenguaje de programación de uso general de código del lado del servidor originalmente diseñado para el desarrollo web de contenido dinámico. Fue uno de los primeros lenguajes de programación del lado del servidor.
                        </p>
                    </div>
                    <div class="col s4 tecnologie">
                        <h5>MYSQL</h5>
                        <div class="image-wrapper">
                            <img src="/sources/photos/tecnologies/mysql.png" alt="MYSQL" />
                        </div>
                        <p>
                            MySQL es un sistema de gestión de bases de datos relacional y está considerada como la base datos open source más popular del mundo, sobre todo para entornos de desarrollo web.
                        </p>
                    </div>
                    <div class="col s4 tecnologie">
                        <h5>SASS</h5>
                        <div class="image-wrapper">
                            <img class="smaller" src="/sources/photos/tecnologies/sass.svg" alt="SASS" />
                        </div>
                        <p>
                            Sass es un metalenguaje de Hojas de Estilo en Cascada (CSS). Es un lenguaje de script que es traducido a CSS. Sass proporciona el uso de: variables, nesting (anidamiento), mixins, y herencia de los selectores.
                        </p>
                    </div>
                    <div class="col s4 tecnologie">
                        <h5>GIT</h5>
                        <div class="image-wrapper">
                            <img src="/sources/photos/tecnologies/git.png" alt="GIT" />
                        </div>
                        <p>
                            Git es un software de control de versiones diseñado por Linus Torvalds, pensando en la eficiencia y la confiabilidad del mantenimiento de versiones de aplicaciones cuando éstas tienen un gran número de archivos de código fuente
                        </p>
                    </div>
                    <div class="col s4 tecnologie">
                        <h5>MATERIALIZE CSS</h5>
                        <div class="image-wrapper">
                            <img src="/sources/photos/tecnologies/materialize.png" alt="MATERIALIZE" />
                        </div>
                        <p>
                            Materialize CSS es un framework de estilos Material Design. Este estilo de diseño fue creado y diseñado por google que combina los principios clásicos de diseños exitosos junto con innovación y tecnología.
                        </p>
                    </div>
                    <div class="col s4 tecnologie">
                        <h5>GULP JS</h5>
                        <div class="image-wrapper">
                            <img src="/sources/photos/tecnologies/gulp.png" alt="GULP JS" />
                        </div>
                        <p>
                            Gulp JS es un task runner que nos permite realizar tareas varias para facilitar el desarrollo del sitio web. En nuestro caso, lo utilizamos para compilar SASS en CSS.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
