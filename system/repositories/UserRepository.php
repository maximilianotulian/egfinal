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

        function getUserRoles($userId){
            $query_string = '
            SELECT p.description FROM permissions p
            INNER JOIN role_permission rp ON rp.id_permission = p.id
            INNER JOIN roles r ON r.id = rp.id_role
            INNER JOIN user_role ur ON ur.id_role = r.id
            INNER JOIN users u ON u.id = ur.id_user
            WHERE u.id = ?;';
            $searchElement = array(
                'id' => $userId
            );
            return $this->executePrepareStatement($query_string, $searchElement);
        }

    }

 ?>
