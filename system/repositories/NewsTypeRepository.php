<?php
    namespace App\System\Repositories;

    include_once 'BaseRepository.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
    Use \App\System\Repositories\BaseRepository as BaseRepository;

    class NewsTypeRepository extends BaseRepository{

        function __construct(){
            parent::__construct('news_type');
        }
    }
?>
