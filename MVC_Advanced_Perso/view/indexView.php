<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails des Joueurs</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }
        .joueur-info {
            font-size: 1.2rem; /* Taille de police pour les informations des joueurs */
        }
        .card-title {
            font-size: 1.5rem; /* Taille de police pour le titre */
        }
        .btn {
            margin-top: 10px; /* Espacement pour les boutons */
        }
        .photo-profil {
            width: 150px; /* Largeur de l'image */
            height: 150px; /* Hauteur de l'image */
            border-radius: 50%; /* Rendre l'image ronde */
            object-fit: cover; /* Couvrir tout le conteneur sans déformation */
        }
    </style>
</head>
<body>
    <?php include 'composantView/navBar.php'; ?>

    <div class="container">
        <h3 class="text-center">Liste des Joueurs</h3> <br> <br> <br>
        <div class="row">
            <?php foreach($data["joueurs"] as $joueur) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?php echo $joueur["photo"]; ?>" alt="Photo de profil" class="photo-profil"><br> <br>
                            <h5 class="card-title"><strong><?php echo $joueur["pseudo"]; ?></strong></h5>
                            <p class="joueur-info">
                                <strong>Rank :</strong> <?php echo $joueur["rankrl"]; ?><br>
                                <strong>mmr :</strong> <?php echo $joueur["mmr"]; ?><br>
                                <strong>Email :</strong> <?php echo $joueur["email"]; ?>
                            </p>
                            <div class="text-right">
                                <!-- Détail -->
                                <a href="index.php?controller=joueurs&action=detail&id=<?php echo $joueur['idjoueur']; ?>" class="btn btn-info">
                                    <i class="fa-solid fa-circle-info"></i> Détails
                                </a>

                                <!-- Formulaire de suppression -->
                                <form action="index.php?controller=joueurs&action=delete" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $joueur['idjoueur']; ?>" />
                                    <button type="submit" class="btn btn-danger" 
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce joueur ?');">
                                        <i class="fa-solid fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>
