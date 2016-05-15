<?php
    namespace App\System\Repositories;
    include_once $_SERVER["DOCUMENT_ROOT"].'/system/repositories/BaseRepository.php';
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

        function getUserPermissions($userId){
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

        function add($user){
            $userId = parent::add($user);
            $this->setUserRole($userId);
            return $userId;
        }

        function setUserRole($userId, $userRole = 3){
            $newElement = array(
                'id_user' => $userId,
                'id_role' => $userRole
            );
            $query_string = 'INSERT INTO user_role (';
            $columnNames = array_keys($newElement);
            $query_string = $this->addColumnNames($query_string, $columnNames);
            $query_string = $this->addValues($query_string, count($columnNames));
            return $this->executePrepareStatement($query_string, $newElement, $noResults = true);
        }

        function updateUserRole($userId, $userRole = 3){
            $query_string = 'UPDATE user_role SET ';
            $updatedElement = array(
                'id_user' => $userId,
                'id_role' => $userRole
            );
            $query_string = $this->addUpdateValues($query_string, $updatedElement);
            $query_string .= ' WHERE id_user = ' . $updatedElement['id_user'];
            $this->executePrepareStatement($query_string, $updatedElement, $noResults = true);
        }

        function getAll(){
            $users = parent::getAll();
            foreach ($users as &$user) {
                $user['role'] = $this->getUserRole($user['id']);
            }
            return $users;
        }

        function getById($id){
            $user = parent::getById($id);
            $user[0]['role'] = $this->getUserRole($id);
            return $user;
        }

        function getUserRole($userId){
            $query_string = 'SELECT r.id, r.description FROM roles r
                             INNER JOIN user_role ur on ur.id_role = r.id
                             WHERE ur.id_user = ?';
             $searchElement = array(
                 'id' => $userId
             );
            return $this->executePrepareStatement($query_string, $searchElement);
        }

        function getAllRoles(){
            $query_string = 'SELECT * FROM roles';
            return $this->executePrepareStatement($query_string);
        }

    }

 ?>
