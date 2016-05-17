<?php
    namespace App\System;
    /**
     *    Db Manager class
     */
    class DbManager{

        private $dbHost = 'localhost';
        private $dbUser = 'root';
        private $dbPassword = '';
        private $dbName = 'portal_db';
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
