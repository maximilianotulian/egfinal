<?php
    namespace App\System\Repositories;

    include_once 'BaseRepository.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
    Use \App\System\Repositories\BaseRepository as BaseRepository;
    Use \App\System\Helpers\DateHelper as DateHelper;

    class NewsRepository extends BaseRepository{

        function __construct(){
            parent::__construct('news');
        }

        function add($new){
            $new['created_at'] = DateHelper::getNowDate();
            parent::add($new);
        }

    }

 ?>
