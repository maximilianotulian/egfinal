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

        function getAllTeachers(){
            $query_string = 'SELECT * FROM users u
            INNER JOIN user_role ur on ur.id_user =  u.id
            INNER JOIN roles r on r.id = ur.id_role
            WHERE r.id = 2';
            return $this->executePrepareStatement($query_string);
        }

        function asignUserToSubject($newAsignation){
            $query_string = 'INSERT INTO user_subject (';
            $columnNames = array_keys($newAsignation);
            $query_string = $this->addColumnNames($query_string, $columnNames);
            $query_string = $this->addValues($query_string, count($columnNames));
            return $this->executePrepareStatement($query_string, $newAsignation, $noResults = true);
        }

        function asignTeacherToSubject($teacher_id, $subject_id){
            $newAsignation = array(
                'id_user' => $teacher_id,
                'id_subject' => $subject_id,
                'active' => 1
            );
            return $this->asignUserToSubject($newAsignation);
        }

        function asignStudentToSubject($student_id, $subject_id){
            $newAsignation = array(
                'id_user' => $student_id,
                'id_subject' => $subject_id,
                'active' => 0
            );
            return $this->asignUserToSubject($newAsignation);
        }

        function removeUserFromSubject($id_user, $subject_id){
            $query_string = 'DELETE FROM user_subject
                             WHERE id_user = ?
                             AND id_subject = ?';
            $deleteElement = array(
                'id_user' => $id_user,
                'id_subject' => $subject_id
            );
            return $this->executePrepareStatement($query_string, $deleteElement, $noResults = true);
        }

        function userHasSubject($user_id, $subject_id, $active = false){
            $query_string = 'SELECT * FROM user_subject
                             WHERE id_user = ?
                             AND id_subject = ?';
            $searchElement = array(
                'id_user' => $user_id,
                'id_subject' => $subject_id
            );
            if($active){
                $query_string .= ' AND active';
            }
            if ($this->executePrepareStatement($query_string, $searchElement)){
                return true;
            } else {
                return false;
            }
        }

        function activeStudent($student_id, $subject_id){
            $query_string = 'UPDATE user_subject
                             SET active=1
                             WHERE id_user = ? AND id_subject = ?';
            $updatedElement = array(
                'id_user' => $student_id,
                'id_subject' => $subject_id
            );

            return $this->executePrepareStatement($query_string, $updatedElement, $noResults = true);
        }

    }

 ?>
