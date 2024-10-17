<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Menu Navbar</title>
    <!-- MDBootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet">
    <!-- Font Awesome (for the bars icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
      data-mdb-target="#navbarToggleExternalContent2" aria-controls="navbarToggleExternalContent2"
      aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i> 
    </button>
  </div>
</nav>

<!-- Collapsible content -->
<div class="collapse" id="navbarToggleExternalContent2">
  <div class="bg-body-tertiary shadow-3 p-4">
    <a href="index.php" class="btn btn-link btn-block border-bottom m-0 fs-5">Accueil</a>
    <a href="index.php?controller=Joueur&action=initJoueur" class="btn btn-link btn-block border-bottom m-0 fs-5">Ajouter Joueur</a>
    <a href="#" class="btn btn-link btn-block m-0 fs-5">s 3</a>
  </div>
</div>

</div>


<!-- MDBootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"></script>

</body>
</html>