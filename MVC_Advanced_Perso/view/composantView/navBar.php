<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Menu Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (for the bars icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>

<div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-body-tertiary shadow-3 p-4">
        <a href="index.php" class="btn btn-primary btn-lg btn-block mb-2">Accueil</a>
        <a href="index.php?controller=Joueur&action=initJoueur" class="btn btn-success btn-lg btn-block mb-2">Ajouter Joueur</a>
        <a href="#" class="btn btn-info btn-lg btn-block mb-2">À propos</a>
        <a href="#" class="btn btn-warning btn-lg btn-block mb-2">Contact</a>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
