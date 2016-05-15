<?php
    namespace App\System\Repositories;

    include_once $_SERVER["DOCUMENT_ROOT"].'/system/db/DbManager.php';
    Use \App\System\DbManager as DbManager;

    class BaseRepository{

        protected $tableName;

        function __construct($tableName){
            $this->tableName = $tableName;
        }

        function getAll(){
            $query_string = 'SELECT * FROM ' . $this->tableName;
            return $this->executePrepareStatement($query_string);
        }

        function getById($id){
            $query_string = 'SELECT * FROM ' . $this->tableName . ' WHERE id = ?';
            $searchElement = array(
                'id' => $id
            );
            return $this->executePrepareStatement($query_string, $searchElement);
        }

        function add($newElement){
            $query_string = 'INSERT INTO ' . $this->tableName . '(';
            $columnNames = array_keys($newElement);
            $query_string = $this->addColumnNames($query_string, $columnNames);
            $query_string = $this->addValues($query_string, count($columnNames));
            return $this->executePrepareStatement($query_string, $newElement, $noResults = true);
        }

        function update($updatedElement){
            $query_string = 'UPDATE ' . $this->tableName . ' SET ';
            $query_string = $this->addUpdateValues($query_string, $updatedElement);
            $query_string .= ' WHERE ID = ' . $updatedElement['id'];
            return $this->executePrepareStatement($query_string, $updatedElement, $noResults = true);
        }

        function delete($id){
            $query_string = 'DELETE FROM ' . $this->tableName . ' WHERE Id = ?';
            $deleteElement = array(
                'id' => $id
            );
            return $this->executePrepareStatement($query_string, $deleteElement, $noResults = true);
        }

        private function addColumnNames($query_string, $columnNames){
            foreach ($columnNames as $key => $columnName) {
                $query_string .= $columnName . ',';
            }
            $query_string = rtrim($query_string, ",");
            $query_string .= ')';
            return $query_string;
        }

        private function addValues($query_string, $quantity){
            $query_string .= ' VALUES (';
            for ($i=1; $i <= $quantity; $i++) {
                $query_string .= '?,';
            }
            $query_string = rtrim($query_string, ",");
            $query_string .= ')';
            return $query_string;
        }

        private function addUpdateValues($query_string, $updatedElement){
            foreach ($updatedElement as $key => $value) {
                $query_string .= $key . '=? ,';
            }
            $query_string = rtrim($query_string, ",");
            return $query_string;
        }

        private function getTypeString($newElement){
            $types = '';
            foreach ($newElement as $key => $value) {
                switch (gettype($value)) {
                    case 'string':
                        $types .= 's';
                        break;
                    case 'integer':
                        $types .= 'i';
                        break;
                    case 'double':
                        $types .= 'd';
                        break;
                    case 'boolean':
                        $types .= 'i';
                        break;
                }
            }
            return $types;
        }

        private function bindParameters($stmt, $newElement){
            $types = $this->getTypeString($newElement);
            $params[] = $types;

            foreach ($newElement as $key => $param) {
                $params[$key] = &$newElement[$key];
            }

            call_user_func_array(array($stmt,'bind_param'), $params);

            return $stmt;
        }

        protected function executePrepareStatement($query_string, $element = null, $noResults = false){
            $dbManager = new DbManager();
            $connection = $dbManager->getConnection();
            $return = null;
            if($stmt = $connection->prepare($query_string)){
                if($element){
                    $stmt = $this->bindParameters($stmt, $element);
                }
                if ($stmt->execute()){
                    if($noResults){
                        $result = true;
                    }else{
                        $query = $stmt->get_result();
                        $result = $query->fetch_all(MYSQLI_ASSOC);
                        $query->free();
                    }

                }else{
                    print_r('Error on execution '.$connection->error);
                }
            }else{
                print_r('Error on prepared connection '.$connection->error);
            }

            $connection->close();
            return $result;
        }
    }

 ?>
