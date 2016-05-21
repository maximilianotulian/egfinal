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

        function setAuthor($new){
            $query_string = 'SELECT u.name, u.lastname FROM users u
                             INNER JOIN news n on n.id_user = u.id
                             WHERE n.id = ?';
            $getNew = array(
                'id' => $new['id']
            );

            $author = $this->executePrepareStatement($query_string, $getNew)[0];
            $new['author'] = $author['name'].' '.$author['lastname'];
            return $new;
        }

        function getAll(){
            $news = parent::getAll();
            foreach ($news as &$new) {
                $new = $this->setAuthor($new);
                $new = $this->setType($new);
                if($new['id_subject']){
                    $new = $this->setSubject($new);
                }
            }
            return $news;
        }

        function getById($id){
            $new = parent::getById($id);
            $new[0] = $this->setAuthor($new[0]);
            return $new;
        }

        function setType($new){
            $query_string = 'SELECT * FROM news_type WHERE id = ?';
            $getNew = array(
                'id' => $new['id_type']
            );
            $new['type'] = $this->executePrepareStatement($query_string, $getNew)[0];
            return $new;
        }

        function setSubject($new){
            $query_string = 'SELECT * FROM subjects WHERE id = ?';
            $getNew = array(
                'id' => $new['id_subject']
            );
            $new['subject'] = $this->executePrepareStatement($query_string, $getNew)[0];
            return $new;
        }

    }

 ?>
