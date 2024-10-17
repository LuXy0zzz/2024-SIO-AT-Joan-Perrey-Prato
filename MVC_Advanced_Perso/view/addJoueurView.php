<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Joueur</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond */
        }
        .container {
            margin-top: 50px; /* Marges supérieures */
        }
        .form-card {
            padding: 20px; /* Espacement intérieur de la carte */
            border-radius: 8px; /* Coins arrondis */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); /* Ombre */
            background-color: white; /* Couleur de fond de la carte */
        }
        .icon-btn {
            display: flex;
            align-items: center; /* Aligne l'icône avec le texte */
        }
        .icon-btn i {
            margin-right: 7px; /* Ajoute un espace entre l'icône et le texte */
        }
    </style>
</head>
<body>
    <?php include 'composantView/navBar.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="form-card">
                    <h3 class="text-center">Ajouter Joueur</h3>
                    <form action="index.php?controller=joueurs&action=creer" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="pseudo_rl">Pseudo:</label>
                            <input type="text" name="pseudo_rl" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="rankrl_rl">Rank:</label>
                            <input type="text" name="rankrl_rl" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="mmr_rl">Mmr:</label>
                            <input type="text" name="mmr_rl" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email_rl">Email:</label>
                            <input type="email" name="email_rl" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="photo_rl">Photo:</label>
                            <input type="file" name="photo_rl" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success icon-btn">
                            <i class="fa-solid fa-paper-plane" style="color: #ffffff;"></i> Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
