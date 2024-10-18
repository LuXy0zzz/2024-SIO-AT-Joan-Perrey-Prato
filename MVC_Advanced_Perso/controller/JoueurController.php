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
    public function creer() {
        $Joueur = new Joueur($this->connexion);
        $Joueur->setpseudo($_POST["pseudo_rl"]);
        $Joueur->setrankrl($_POST["rankrl_rl"]);
        $Joueur->setmmr($_POST["mmr_rl"]);
        $Joueur->setemail($_POST["email_rl"]);
    
        // Gérer l'upload de la photo
        if (!empty($_FILES['photo_rl']['name'])) {
            $target_dir = "uploads/";
            
            // Créer le répertoire si nécessaire
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
    
            // Obtenir l'extension du fichier
            $file_ext = strtolower(pathinfo($_FILES["photo_rl"]["name"], PATHINFO_EXTENSION));
            $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    
            // Vérifier si l'extension est valide
            if (in_array($file_ext, $allowed_ext)) {
                $target_file = $target_dir . uniqid() . '.' . $file_ext; // Générer un nom unique pour éviter les conflits
    
                // Vérifier si le fichier a été déplacé correctement
                if (move_uploaded_file($_FILES["photo_rl"]["tmp_name"], $target_file)) {
                    $Joueur->setphoto($target_file);
                } else {
                    // Gérer l'erreur si le fichier n'a pas pu être téléchargé
                    echo "Erreur lors du téléchargement de l'image.";
                    return;
                }
            } else {
                // Gérer l'erreur si l'extension n'est pas autorisée
                echo "Extension de fichier non autorisée.";
                return;
            }
        }
    
        // Insérer les données du joueur dans la base de données
        if ($Joueur->insert()) {
            header('Location: index.php');
            exit;
        } else {
            echo "Erreur lors de l'insertion du joueur dans la base de données.";
        }
    }
    
    
    public function maj() {
        $Joueur = new Joueur($this->connexion);
        $Joueur->setidjoueur($_POST["id"]);
        $Joueur->setpseudo($_POST["pseudo_rl"]);
        $Joueur->setrankrl($_POST["rankrl_rl"]);
        $Joueur->setmmr($_POST["mmr_rl"]);
        $Joueur->setemail($_POST["email_rl"]);
    
        // Vérifier si une nouvelle photo est téléchargée
        if (!empty($_FILES['photo_rl']['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["photo_rl"]["name"]);
            move_uploaded_file($_FILES["photo_rl"]["tmp_name"], $target_file);
            $Joueur->setphoto($target_file);
        } else {
            // Récupérer l'ancienne photo du joueur avant la mise à jour
            $ancienJoueur = $Joueur->getById($_POST["id"]);
            $Joueur->setphoto($ancienJoueur->photo);
        }
    
        if ($Joueur->update()) {
            header('Location: index.php');
        }
    }
    
    
    public function delete() {
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