<?php

    class Connecteur{
        private $driver;
        private $host, $user, $pass, $database, $charset;

        public function __construct(){
            $db_cfg = require_once '../config/database.php';
            $this->driver=DB_DRIVER;
            $this->host=DB_HOST;
            $this->user=DB_USER;
            $this->pass=DB_PASS;
            $this->database=DB_DATABASE;
            $this->charset=DB_CHARSET;
        }

        public function connexion() {
            $bdd =  $this->driver . ':host=' . $this->host . ';dbname=' . $this->database . ';charset=' . $this->charset;
            try{
                $connection = new PDO($bdd, $this->user, $this->pass);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connection;
            }catch (PDOException $e){
                throw new Exception('Probleme de connexion à la base de donnée. Merci de prévenir votre administrateur.');
            }
        }
    }
?>