<?php
class Joueurscontroller{
    private $connecteur;
    private $connexion;

    public function __construct(){
        require_once __DIR__ ."/../core/connecteur.php";
        require_once __DIR__ ."/../model/joueur.php";
    
        $this->connecteur = new Connecteur();
        $this->connexion=$this->connecteur->connexion();
    }

    public function run($action){
        switch($action){
            case "index" :
                $this->index();
                break;
            case "creer" :
                $this->creer();
                break;
            case "detail" :
                $this->detail();
                break;
            case "maj" :
                $this->maj();
                break;
            case "delete" :
                $this->delete();
                break;
            case "initJoueur" :
                $this->initJoueur();
                break;
            default :
                $this->index();
                break;
        }
    }

    public function index(){
        $Joueur = new Joueur($this->connexion);
        $listeJoueurs = $Joueur->getAll();
        $this->view("index", array("joueurs"=>$listeJoueurs, "titre"=> "PHP MVC"));
    }
    public function detail(){
        $Joueur = new Joueur($this->connexion);
        $unJoueur = $Joueur->getById($_GET["id"]);
        $this->view("detail", array("joueur"=>$unJoueur, "titre"=> "Detail Joueur"));
    }
    public function creer(){
        $Joueur = new Joueur($this->connexion);
        $Joueur->setpseudo($_POST["pseudo_rl"]);
        $Joueur->setrankrl($_POST["rankrl_rl"]);
        $Joueur->setmmr($_POST["mmr_rl"]);
        $Joueur->setemail($_POST["email_rl"]);
        if($Joueur->insert()){
            header('Location: index.php');
            exit;
        }
    }
    public function maj(){
        $Joueur = new Joueur($this->connexion);
        $Joueur->setidjoueur($_POST["id"]);
        $Joueur->setpseudo($_POST["pseudo_rl"]);
        $Joueur->setrankrl($_POST["rankrl_rl"]);
        $Joueur->setmmr($_POST["mmr_rl"]);
        $Joueur->setemail($_POST["email_rl"]);
        if($Joueur->update())
            header('Location: index.php');
    }

    public function delete(){
        if (isset($_POST["id"])) {
            $Joueur = new Joueur($this->connexion);
            $Joueur->setidjoueur($_POST["id"]);
            if ($Joueur->delete()) {
                header('Location: index.php');
                exit;
            }
        } else {
            // Gérer le cas où aucun ID n'est spécifié
            echo "Erreur : ID du joueur non spécifié.";
        }
    }
    public function initJoueur(){
        $this->view("addJoueur", array("", "titre"=> "Ajout de Joueur"));
    }
    

    function view($name,$data){
        require_once __DIR__ . "/../view/". $name . "View.php";
    }
}