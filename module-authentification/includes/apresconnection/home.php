<?php 
include 'nonconnecter.php';

include '../database.php';
global $db;

$email = $_SESSION['email'];
$requete = "SELECT Admin FROM utilisateur WHERE email = :email";
$s = $db->prepare($requete);
$s->bindParam(':email', $email);
$s->execute();
$utilisateurs = $s->fetch(PDO::FETCH_ASSOC);
$administrateur = $utilisateurs['Admin'] == 1;
$superutilisateur = $utilisateurs['Admin'] == 2;
?>

<!DOCTYPE html>
<head>
    <title>Page d'accueil</title>
</head>
<body>

    <h1>Bienvenue sur votre profil <?= $_SESSION['email']; ?></h1>
    <?php 
    if ($administrateur) {
        echo "<h2>Vous êtes connecté en tant <u>qu'administrateur</u></h2>";
    } elseif ($superutilisateur) {
        echo "<h2>Vous êtes connecté en tant que <u>super utilisateur</u></h2>";
    } else { 
        echo "<h2>Vous êtes connecté en tant <u>qu'utilisateur</u></h2>";
    }
    ?>
    
    <br><br><br><br><br>
    <p> ------------------ </p>
    <a href="http://localhost/PROJET-SIO-2A/2024-SIO-AT-Joan-Perrey-Prato/module-authentification/"><button>Retour page de connexion</button></a>

</body>
</html>
