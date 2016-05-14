<?php
    namespace App\System\Repositories;

    include_once 'BaseRepository.php';
    Use \App\System\Repositories\BaseRepository as BaseRepository;

    class UserRepository extends BaseRepository{

        function __construct(){
            parent::__construct('users');
        }

        function findByUsername($username){
            $query_string = 'SELECT * FROM users WHERE username = ?';
            $searchElement = array(
                'username' => $username
            );
            return $this->executePrepareStatement($query_string, $searchElement);
        }

        function findByEmail($email){
            $query_string = 'SELECT * FROM users WHERE email = ?';
            $searchElement = array(
                'email' => $email
            );
            return $this->executePrepareStatement($query_string, $searchElement);
        }

    }

 ?>
