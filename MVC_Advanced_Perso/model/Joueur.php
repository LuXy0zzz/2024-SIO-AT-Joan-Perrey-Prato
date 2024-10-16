<?php

    // nom du fichier est le meme nom que la table !! ;)
    class Joueur{
        private $table='Joueur';
        private $connexion;

        private $idjoueur;
        private $pseudo;
        private $rankrl;
        private $mmr;
        private $email;

        public function __construct($connexion) {
            $this->connexion= $connexion;          
        }

        public function getidjoueur(){
            return $this->idjoueur;
        }
        public function getpseudo(){
            return $this->pseudo;
        }
        public function getrankrl(){
            return $this->rankrl;
        }
        public function getmmr(){
            return $this->mmr;
        }
        public function getemail(){
            return $this->email;
        }

        public function setidjoueur($id){
            $this -> idjoueur = $id;
        }
        public function setpseudo($pseudo_rl){
            $this -> pseudo = $pseudo_rl;
        }
        public function setrankrl($rankrl_rl){
            $this -> rankrl = $rankrl_rl;
        }
        public function setmmr($mmr_rl){
            $this -> mmr = $mmr_rl;
        }
        public function setemail($email_rl){
            $this -> email = $email_rl;
        }


        public function getAll(){
            $query = $this->connexion->prepare("SELECT idjoueur,pseudo,rankrl,mmr,email FROM ".$this->table); //ouvre la connexion
            $query->execute();
            $result = $query->fetchAll();
            
            return $result;
        }

        public function getById($id){
            $query = $this->connexion->prepare("SELECT idjoueur,pseudo,rankrl,mmr,email FROM ".$this->table. " WHERE idjoueur = :id");

            $query->execute(array(
                "id" => $id
            ));

            $result = $query->fetchObject();
            
            return $result;
        }

        public function insert(){
            $query = $this->connexion->prepare("INSERT INTO ".$this->table. "(pseudo,rankrl,mmr,email) VALUES (:pseudo_rl, :rankrl_rl, :mmr_rl, :email_rl)");

            $result = $query->execute(array(
                "pseudo_rl" => $this->pseudo,
                "rankrl_rl" => $this->rankrl,
                "mmr_rl" => $this->mmr,
                "email_rl" => $this->email
            ));

            
            
            return $result;
        }

        public function update(){
            $query = $this->connexion->prepare("UPDATE ".$this->table. " SET pseudo=:pseudo_rl, rankrl=:rankrl_rl, mmr=:mmr_rl, email=:email_rl WHERE idjoueur = :id");

            $result = $query->execute(array(
                "id" => $this->idjoueur,
                "pseudo_rl" => $this->pseudo,
                "rankrl_rl" => $this->rankrl,
                "mmr_rl" => $this->mmr,
                "email_rl" => $this->email
            ));

            
            $this->connexion = null;
            return $result;
        }

        public function delete(){
            $query = $this->connexion->prepare("DELETE FROM ".$this->table. " WHERE idjoueur = :id");
        
            $result = $query->execute(array(
                "id" => $this->idjoueur
            ));
        
            return $result;
        }
        


    }