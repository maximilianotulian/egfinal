<?php
    namespace App\System\Repositories;

    include_once 'BaseRepository.php';
    Use \App\System\Repositories\BaseRepository as BaseRepository;

    class NewsRepository extends BaseRepository{

        function __construct(){
            parent::__construct('news');
        }

    }

 ?>
