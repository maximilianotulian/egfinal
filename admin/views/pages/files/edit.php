<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/SubjectRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/repositories/FilesRepository.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/UserHelper.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/FileUpload.php';
    include_once  $_SERVER["DOCUMENT_ROOT"].'/system/utils/Permissions.php';

    Use \App\System\Helpers\UserHelper as UserHelper;
    Use \App\System\Helpers\FileUpload as FileUpload;
    Use \App\System\Helpers\Permissions as Permissions;
    Use \App\System\Repositories\FilesRepository as FilesRepository;
    Use \App\System\Repositories\SubjectRepository as SubjectRepository;

    $subjectRepository = new SubjectRepository();
    $fileRepository = new FilesRepository();
    $loggedUser = UserHelper::getLoggedUser();

    if(UserHelper::loggedUserHasPermission(Permissions::SEE_ALL_SUBJECTS)){
        $subjects = $subjectRepository->getAll();
    }else{
        $subjects = $subjectRepository->getSubjectsByTeacher($loggedUser['id']);
    }

    $editFile = array(
        'description' => '',
        'path' => '',
        'id_user' => '',
        'id_subject' => '',
    );

    if ($file){
        $editFile = $fileRepository->getById($file)[0];
    }

    if (isset($_POST['description']) ){
        $editFile = array(
            'description' => $_POST['description'],
            'id_user' => $loggedUser['id'],
            'id_subject' => $_POST['id_subject']
        );
        if(isset($_FILES['path'])){
            if($_FILES['path']['name'] != ''){
                $editFile['path'] = FileUpload::uploadFile($_FILES["path"], '/files/');
            }
        }
        if (isset($file) && $file != 0){
            $editFile['id'] = $file;
            $fileRepository->update($editFile);
        }else{
            $fileRepository->add($editFile);
        }

    }

 ?>


<div class="row">
    <div class="col s8">
        <div class="row">
          <form class="col s12" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                  <input id="title" type="text" class="validate" name="description" value="<?php echo $editFile['description'] ?>">
                  <label for="title">Descripción</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                  <div class="file-field input-field">
                    <div class="btn">
                      <span>Archivo</span>
                      <input type="file" name="path">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
              </div>
            </div>
            <div class="row valign-wrapper">
                <div class="input-field col s12 valign">
                  <select class="teacher-selector" name="id_subject">
                    <option value="" disabled selected>Materia</option>
                    <?php foreach ($subjects as $key => $subject) {?>
                        <option value="<?php echo $subject['id'] ?>"><?php echo $subject['description'];?></option>
                    <?php }?>
                  </select>
                  <label>Materia</label>
                </div>
            </div>
            <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Guardar</button>
          </form>
        </div>
    </div>
</div>
