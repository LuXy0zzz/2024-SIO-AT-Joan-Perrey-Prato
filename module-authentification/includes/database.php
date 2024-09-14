<?php

$serveur = 'localhost'; 
$utilisateur = 'root'; 
$mot_de_passe = ''; 
$nom_base_de_donnees = 'projet1sio2a-mcv';


try {
    $db = new PDO("mysql:host=$serveur;dbname=$nom_base_de_donnees", $utilisateur, $mot_de_passe);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
