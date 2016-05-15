<?php
    namespace App\System\Repositories;

    include_once 'BaseRepository.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
    Use \App\System\Repositories\BaseRepository as BaseRepository;
    Use \App\System\Helpers\DateHelper as DateHelper;

    class CommentsRepository extends BaseRepository{

        function __construct(){
            parent::__construct('comments');
        }

        function add($comment){
            $comment['created_at'] = DateHelper::getNowDate();
            parent::add($comment);
        }

        function setAuthor($comment){
            $query_string = 'SELECT u.name, u.lastname FROM users u
                             INNER JOIN comments c on c.id_user = u.id
                             WHERE c.id = ?';
            $getNew = array(
                'id' => $comment['id']
            );

            $author = $this->executePrepareStatement($query_string, $getNew)[0];
            $comment['author'] = $author['name'].' '.$author['lastname'];
            return $comment;
        }

        function getAllByNew($newId){

            $query_string = 'SELECT * FROM comments WHERE id_new = ?';
            $searchElement = array(
                'id_new' => $newId
            );
            $comments = $this->executePrepareStatement($query_string, $searchElement);

            foreach ($comments as &$comment) {
                $comment = $this->setAuthor($comment);
            }
            return $comments;
        }

    }

 ?>
