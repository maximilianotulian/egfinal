<?php
    namespace App\System\Repositories;

    include_once 'BaseRepository.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/system/utils/DateHelper.php';
    Use \App\System\Repositories\BaseRepository as BaseRepository;

    class SubjectRepository extends BaseRepository{

        function __construct(){
            parent::__construct('subjects');
        }

        function isTeacherOf($subject_id, $teacher_id){
            $query_string = 'SELECT * FROM user_subject
                             WHERE id_user = ?
                             AND id_subject = ?
                             AND active';
            $searchElement = array(
                'id_user' => $teacher_id,
                'id_subject' => $subject_id
            );
            $result =  $this->executePrepareStatement($query_string, $searchElement);
            if ($result){
                return true;
            }else{
                return false;
            }
        }

        function getTeachers($subject_id){
            return $this->getMembers($subject_id, 2);
        }

        function getSubjectsByTeacher($teacher_id){
            $query_string = 'SELECT * FROM subjects s
                         INNER JOIN user_subject us ON us.id_subject = s.id
                         WHERE us.id_user = ?';
            $searchElement = array(
             'id_user' => $teacher_id
            );
            return $this->executePrepareStatement($query_string, $searchElement);
        }

        function getSubjectsByStudent($student_id){
            $query_string = 'SELECT * FROM subjects s
                         INNER JOIN user_subject us ON us.id_subject = s.id
                         WHERE us.id_user = ? and us.active';
            $searchElement = array(
             'id_user' => $student_id
            );

            return $this->executePrepareStatement($query_string, $searchElement);
        }

        function getStudents($subject_id){
            return $this->getMembers($subject_id, 3);
        }

        function getMembers($subject_id, $role){
            $query_string = 'SELECT u.id, u.name, u.lastname, us.active FROM users u
                            INNER JOIN user_subject us ON us.id_user = u.id
                            INNER JOIN user_role ur ON ur.id_user = u.id
                            WHERE us.id_subject = ? AND ur.id_role = '.$role;
            $searchElement = array(
                'id_subject' => $subject_id
            );
            return $this->executePrepareStatement($query_string, $searchElement);
        }

    }
?>
