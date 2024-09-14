<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: http://localhost/PROJET-SIO-2A/2024-SIO-AT-Joan-Perrey-Prato/module-authentification/includes/apresconnection/page_erreur.php");
    exit;
}
?>

