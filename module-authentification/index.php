<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>
<body>

    <h1>Bienvenue sur votre profil</h1>
<?php
    if(isset($_SESSION['email']) && (isset($_SESSION['date'])))
    {
        ?>
        <p>Votre Email: <?= $_SESSION['email']; ?> </p> 
        
        <p>Création de votre compte : <?= $_SESSION['date']; ?> </p>
        <?php
            // Vérifier si l'utilisateur est connecté
            if (isset($_SESSION['email'])) {
                echo '<a href="deconnexion.php">Se déconnecter</a>';
            }
        ?>
        <?php

    }else{
        echo "Veuillez vous connectez à votre compte";
    }
?>

    
    <?php include 'includes/database.php';
    global $db;
    ?>
    <h2> Se connecter ?</h2>
    <form method="post">
        <input type="email" name="loginemail" id="loginemail" placeholder="Votre Email" required><br/>
        <input type="password" name="loginmdp" id="loginmdp" placeholder="Votre Mot de Passe" required><br/>
        <input type="submit" name="formlogin" id="formlogin" value="Se connecter">
    </form>

    <?php

        include 'includes/login.php'
    ?>
   

    <br>
    <h2> S'inscrire ?</h2>
    <form method="post">
        <input type="email" name="semail" id="semail" placeholder="Votre Email" required><br/>
        <input type="password" name="mdp" id="mdp" placeholder="Votre Mot de Passe" required><br/>
        <input type="password" name="confirmezmdp" id="confirmezmdp" placeholder="Confirmez Mot de Passe" required><br/>
        <input type="submit" name="forminscrire" id="forminscrire" value="S'inscrire">
    </form>

    <?php

        include 'includes/inscrire.php'
    ?>

   
    <br>
    

</body>
</html>