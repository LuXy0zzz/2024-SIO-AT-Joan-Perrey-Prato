<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: http://localhost/ap2/includes/apresconnection/page_erreur.php");
    exit;
}
?>

