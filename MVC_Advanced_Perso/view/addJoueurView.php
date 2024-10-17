<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Joueur</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        input {
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .right {
            float: right;
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
    <?php
        include 'composantView/navBar.php';
    ?>
    <form action ="index.php?controller=joueurs&action=creer" method ="post" class="col-lg-5">
        <h3>Ajouter Joueur</h3>
        Pseudo: <input type="text" name="pseudo_rl" class="form-control">
        Rank: <input type="text" name="rankrl_rl" class="form-control">
        Mmr: <input type="text" name="mmr_rl" class="form-control">
        Email: <input type="email" name="email_rl" class="form-control">
        <br> <br>
        <button type="submit" class="btn btn-success icon-btn">
            <i class="fa-solid fa-paper-plane" style="color: #ffffff;"></i> Envoyer
        </button>
    </form>
</body>
</html>
