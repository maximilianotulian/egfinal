<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/NewsRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/NewsTypeRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/FileUpload.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/SubjectRepository.php';

    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\FileUpload as FileUpload;
    Use \App\System\Repositories\NewsRepository as NewsRepository;
    Use \App\System\Repositories\NewsTypeRepository as NewsTypeRepository;
    Use \App\System\Repositories\SubjectRepository as SubjectRepository;

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

    $newsTypeRepository = new NewsTypeRepository();
    $types = $newsTypeRepository->getAll();

    $subjectRepository = new SubjectRepository();
    $subjects = $subjectRepository->getSubjectsByTeacher($loggedUser['id']);

    if (isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['intro_text']) && isset($_POST['full_text']) && isset($_POST['id_type']) ){
        $editNew = array(
            'title' => $_POST['title'],
            'subtitle' => $_POST['subtitle'],
            'intro_text' => $_POST['intro_text'],
            'full_text' => $_POST['full_text'],
            'id_user' => $loggedUser['id'],
            'id_type' => $_POST['id_type'],
        );
        if (isset($_POST['id_subject']) && $_POST['id_subject'] != 0){
            $editNew['id_subject'] = $_POST['id_subject'];
        } else if ($_POST['id_subject'] == 0){
            $editNew['id_subject'] = null;
        }
        if(isset($_FILES['image'])){
            if($_FILES['image']['name'] != ''){
                $editNew['image'] = FileUpload::uploadFile($_FILES["image"], '/news/');
            }
        }
        if (isset($new) && $new != 0){
            $editNew['id'] = $new;
            $newsRepository->update($editNew);
            header('Location: /admin/news');
        }else{
            $newsRepository->add($editNew);
            header('Location: /admin/news');
        }

    }

 ?>


<div class="row">
    <div class="col s8">
        <div class="row">
          <form class="col s12" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                  <input id="title" type="text" required class="validate" name="title" value="<?php echo $editNew['title'] ?>">
                  <label for="title">Título</label>
              </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <select name="id_type" required>
                    <option  value="0" disabled selected>Tipo de Noticia</option>
                    <?php
                        foreach ($types as $key => $type) {
                            ?>
                                <option <?php if ($editNew['id_type'] === $type['id']) echo 'selected="selected"'; ?>value="<?php echo $type['id']; ?>"><?php echo $type['description']; ?></option>
                            <?php
                        }
                     ?>
                  </select>
                  <label>Tipo de Noticia</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <select name="id_subject" required>
                    <option value="0" selected>Ninguna</option>
                    <?php
                        foreach ($subjects as $key => $subject) {
                            ?>
                                <option <?php if (isset($editNew['id_subject']) && $editNew['id_subject'] === $subject['id']) echo 'selected="selected"'; ?> value="<?php echo $subject['id']; ?>"><?php echo $subject['description']; ?></option>
                            <?php
                        }
                     ?>
                  </select>
                  <label>Cátedra</label>
                </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                  <input id="subtitle" type="text" class="validate" required name="subtitle" value="<?php echo $editNew['subtitle'] ?>">
                  <label for="subtitle">Subtítulo</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="intro_text" class="materialize-textarea" required name="intro_text"><?php echo $editNew['intro_text'] ?></textarea>
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
                <textarea id="full_text" class="materialize-textarea" required     name="full_text"><?php echo $editNew['full_text'] ?></textarea>
                <label for="full_text">Texto Completo</label>
              </div>
            </div>
            <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Guardar</button>
          </form>
        </div>
    </div>
</div>
