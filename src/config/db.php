<?php
    class db{
        // Properties
        private $dbhost = 'remotemysql.com';
        private $dbuser = '00C3EkJLPr';
        private $dbpass = '15tsM0343D';
        private $dbname = '00C3EkJLPr';

        // Connect
        public function connect(){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }
