<?php

    if(isset($_POST['formlogin'])){
        extract($_POST);

        if(!empty($loginemail) && !empty($loginmdp)){

            $q =$db ->prepare("SELECT * FROM utilisateur WHERE email = :email"); 
            $q->execute(['email' => $loginemail]);
            $result =$q-> fetch();

            if($result == true) {
                //le compte existe bien
                if(password_verify($loginmdp, $result['mdp'])){
                    echo "Le mot de passe est bon connection en cours";
                    $_SESSION['email'] = $result['email']; 
                    $_SESSION['date'] = $result['date'];
                    header("Location: includes/connecte.php");

                }else{
                    echo " le mot de passe n'est pas correct";
                }

            }else{
                echo "Le compte portant l'email " . $loginemail . " n'existe pas";
            }
        }else{
            echo "Veuillez completer l'ensemble des champs";
        }
    }
    
    ?>