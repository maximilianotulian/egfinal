<?php
    namespace App\System\Repositories;

    include_once 'BaseRepository.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
    Use \App\System\Repositories\BaseRepository as BaseRepository;

    class FilesRepository extends BaseRepository{

        function __construct(){
            parent::__construct('files');
        }

        function getAll(){
            $files = parent::getAll();
            foreach ($files as &$file) {
                $file = $this->setAuthor($file);
                $file = $this->setSubject($file);
            }
            return $files;
        }

        function setAuthor($file){
            $query_string = 'SELECT u.name, u.lastname FROM users u
                             INNER JOIN files f on f.id_user = u.id
                             WHERE f.id = ?';
            $getFile = array(
                'id' => $file['id']
            );

            $author = $this->executePrepareStatement($query_string, $getFile)[0];
            $file['author'] = $author['name'].' '.$author['lastname'];
            return $file;
        }

        function setSubject($file){
            $query_string = 'SELECT s.title FROM subjects s
                             INNER JOIN files f on f.id_subject = s.id
                             WHERE f.id = ?';
            $getFile = array(
                'id' => $file['id']
            );

            $subject = $this->executePrepareStatement($query_string, $getFile)[0];
            $file['subject'] = $subject['title'];
            return $file;
        }

        function getAllBySubject($subject_id){
            $query_string = 'SELECT * FROM files WHERE id_subject = ?';
            $subject = array(
                'id_subject' => $subject_id
            );
            $files = $this->executePrepareStatement($query_string, $subject);
            foreach ($files as &$file) {
                $file = $this->setAuthor($file);
            }
            return $files;
        }

    }
?>
