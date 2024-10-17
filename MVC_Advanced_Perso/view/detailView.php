<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Joueur</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
        input {
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .right {
            float: right;
        }
        .profile-photo {
            width: 150px; /* Ajustez la taille si nécessaire */
            height: 150px; /* Ajustez la taille si nécessaire */
            border-radius: 50%; /* Pour rendre l'image ronde */
            object-fit: cover; /* Pour s'assurer que l'image couvre le cadre */
        }
    </style>
</head>
<body>
    <?php include 'composantView/navBar.php'; ?>

    <div class="col-lg-5 mr-auto">
        <!-- Formulaire de modification -->
        <form action="index.php?controller=joueurs&action=maj" method="post" enctype="multipart/form-data">
            <h3>Détails du Joueur</h3>
            <hr/>
            <input type="hidden" name="id" value="<?php echo $data["joueur"]->idjoueur ?>" />
            <img src="<?php echo $data["joueur"]->photo ?>" alt="Photo de profil" class="profile-photo"><br> <!-- Affichage de la photo de profil -->
            Pseudo : <input type="text" name="pseudo_rl" value="<?php echo $data["joueur"]->pseudo ?>" class="form-control" />
            Rank : <input type="text" name="rankrl_rl" value="<?php echo $data["joueur"]->rankrl ?>" class="form-control" />
            Mmr : <input type="text" name="mmr_rl" value="<?php echo $data["joueur"]->mmr ?>" class="form-control" />
            Email : <input type="text" name="email_rl" value="<?php echo $data["joueur"]->email ?>" class="form-control" /> 
            <br> <br>
            <!-- Champ pour uploader une nouvelle photo -->
            <label for="photo_rl">Changer la photo :</label>
            <input type="file" name="photo_rl" id="photo_rl" class="form-control" accept="image/*"/> <!-- Acceptation uniquement des fichiers image -->
            <br>
            <input type="submit" value="Modifier" class="btn btn-success"/>
        </form>
        
        <hr/>

        <!-- Formulaire de suppression -->
        <form action="index.php?controller=joueurs&action=delete" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce joueur ?');">
            <input type="hidden" name="id" value="<?php echo $data["joueur"]->idjoueur ?>" />
            <input type="submit" value="Supprimer" class="btn btn-danger"/>
        </form>

        <hr/>

        <a href="index.php" class="btn btn-info">Retour</a>
    </div>
</body>
</html>
