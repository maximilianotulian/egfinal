<?php
    namespace App\System;
    /**
     *    Db Manager class
     */
    class DbManager{

        private $dbHost = 'localhost';
        private $dbUser = 'admin';
        private $dbPassword = 'admin';
        private $dbName = 'portal';
        private $connection;

        function __construct(){
            $this->connection = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        }

        function getConnection(){
            return $this->connection;
        }

        function closeConnection(){
            $this->connection->close();
        }


    }

 ?>
