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

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .container {
            margin-top: 10px;
        }
        .card {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: white;
            text-align: left; /* Centre tout le contenu */
        }
        .form-group {
            margin-bottom: 10px;
            font-size: 18px;
        }
        h3{
            text-align: center;
        }      
        .btn {
            margin-top: 10px;
        }
        input.form-control, textarea.form-control {
            font-size: 14px; /* Change la taille de la police */
            padding: 10px; /* Ajuste l'espace à l'intérieur des champs */
            line-height: 1.5; /* Espace entre les lignes de texte */
        }


        .btn-success {
            background-color: #28a745 !important; /* Conserve la couleur Bootstrap */
            border-color: #28a745 !important;     
            font-size: 12px !important;
        }

        .btn-danger {
            font-size: 12px !important; /* Ajuste la taille de la police du bouton Supprimer */
            padding: 10px 20px;
        }

        .btn-info {
            font-size: 12px !important; /* Ajuste la taille de la police du bouton Retour */
            padding: 10px 20px;
            width: 20% !important; /* S'assure que la largeur s'ajuste au contenu */
            display: inline-block; 
        }


    </style>
</head>
<body>
    <?php include 'composantView/navBar.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card">
                    <h3>Détails du Joueur</h3>
                    <hr/>
                    <!-- Formulaire de modification -->
                    <form action="index.php?controller=joueurs&action=maj" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $data["joueur"]->idjoueur ?>" />
                        
                        <!-- Photo de profil centrée -->
                        <h3><img src="<?php echo $data["joueur"]->photo ?>" alt="Photo de profil" class="profile-photo"><br><br>
                        </h3>
                        <!-- Informations du joueur -->
                        <div class="form-group">
                            <label for="pseudo_rl">Pseudo :</label>
                            <input type="text" name="pseudo_rl" value="<?php echo $data["joueur"]->pseudo ?>" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="rankrl_rl">Rank :</label>
                            <input type="text" name="rankrl_rl" value="<?php echo $data["joueur"]->rankrl ?>" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="mmr_rl">Mmr :</label>
                            <input type="text" name="mmr_rl" value="<?php echo $data["joueur"]->mmr ?>" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="email_rl">Email :</label>
                            <input type="text" name="email_rl" value="<?php echo $data["joueur"]->email ?>" class="form-control" />
                        </div>
                        
                        <!-- Upload de nouvelle photo -->
                        <div class="form-group">
                            <label for="photo_rl">Changer la photo :</label>
                            <input type="file" name="photo_rl" id="photo_rl" class="form-control" accept="image/*"/>
                        </div>

                        <!-- Bouton de modification -->
                        <button type="submit" class="btn btn-success btn-large-text">
                            <i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffffff;"></i> Modifier
                        </button>
                        </form>

                    <hr/>

                    <!-- Formulaire de suppression -->
                    <form action="index.php?controller=joueurs&action=delete" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce joueur ?');">
                        <input type="hidden" name="id" value="<?php echo $data["joueur"]->idjoueur ?>" />
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash fa-lg"></i> Supprimer
                        </button>
                    </form>


                    <hr/>

                    <!-- Bouton de retour -->
                    <a href="index.php" class="btn btn-info">Retour</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
