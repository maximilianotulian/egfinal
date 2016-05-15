<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/NewsRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/FileUpload.php';

    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\FileUpload as FileUpload;
    Use \App\System\Repositories\NewsRepository as NewsRepository;

    $newsRepository = new NewsRepository();
    $loggedUser = UserHelper::getLoggedUser();

    $editNew = array(
        'title' => '',
        'subtitle' => '',
        'intro_text' => '',
        'full_text' => '',
        'author' => $loggedUser['username'],
        'id_user' => $loggedUser['id']
    );

    if ($new){
        $editNew = $newsRepository->getById($new)[0];
    }


    if (isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['intro_text']) && isset($_POST['full_text']) ){
        $editNew = array(
            'title' => $_POST['title'],
            'subtitle' => $_POST['subtitle'],
            'intro_text' => $_POST['intro_text'],
            'full_text' => $_POST['full_text'],
            'author' => $loggedUser['username'],
            'id_user' => $loggedUser['id']
        );
        if(isset($_FILES['image'])){
            if($_FILES['image']['name'] != ''){
                $editNew['image'] = FileUpload::uploadFile($_FILES["image"], '/news/');
            }
        }
        if (isset($new) && $new != 0){
            $editNew['id'] = $new;
            $newsRepository->update($editNew);
        }else{
            $newsRepository->add($editNew);
        }

    }

 ?>


<div class="row">
    <div class="col s8">
        <div class="row">
          <form class="col s12" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                  <input id="title" type="text" class="validate" name="title" value="<?php echo $editNew['title'] ?>">
                  <label for="title">Título</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                  <input id="subtitle" type="text" class="validate" name="subtitle" value="<?php echo $editNew['subtitle'] ?>">
                  <label for="subtitle">Subtítulo</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="intro_text" class="materialize-textarea" name="intro_text"><?php echo $editNew['intro_text'] ?></textarea>
                <label for="intro_text">Introducción</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Imágen</span>
                      <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="full_text" class="materialize-textarea" name="full_text"><?php echo $editNew['full_text'] ?></textarea>
                <label for="full_text">Texto Completo</label>
              </div>
            </div>
            <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Guardar</button>
          </form>
        </div>
    </div>
</div>
