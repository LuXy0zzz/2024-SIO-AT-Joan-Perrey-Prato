<?php

// Pour ajouter un utilisateur manuellement
/*
include 'database.php';
global $db;  
 
$q= $db->prepare("INSERT INTO utilisateur(pseudo,email,mdp) VALUES(:pseudo,:email,:mdp)"); 
$q->execute([
    'pseudo' => 'Test29',
    'email' => 'grtest29@gmail.com',
    'mdp' => 'ez044z04d4'
]);
*/


if(isset($_POST['forminscrire'])){
    extract($_POST);

    if(!empty($mdp) && !empty($confirmezmdp) && !empty($semail)){
        
        if($mdp != $confirmezmdp){
            echo "ERREUR : les mots de passe ne sont pas similaire.";

        }if($mdp == $confirmezmdp){ 
            $options = [
            'cost' => 12,
            ];
            $mdpHASH = password_hash($mdp, PASSWORD_BCRYPT, $options);
        
            /* POUR CRYPTER UN MDP AVEC LA TECHNIQUE HASH*/
            
            $c= $db->prepare("SELECT email FROM utilisateur WHERE email = :email"); 
            $c->execute(['email' => $semail]);
            $result = $c -> rowCount();

            if($result == 0){
            $q= $db->prepare("INSERT INTO utilisateur(email,mdp) VALUES(:email,:mdp)"); 
            $q->execute([
                'email' => $semail,
                'mdp' => $mdpHASH
            ]);
            echo "le compte a été créée !";

            }else{
                echo "ERREUR : cet email existe déjà, veuillez vous connecter";
            }
        } 
    }
}
?>