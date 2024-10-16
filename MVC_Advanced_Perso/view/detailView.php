<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> <!-- Correction ajout CSS bootstrap -->
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> <!-- Correction ajout JS bootstrap -->
    <style>
        input{
            margin-top:5px;
            margin-bottom:5px;
        }
        .right{
            float:right;
        }
    </style>
</head>
<body>
<div class="col-lg-5 mr-auto">
    <!-- Formulaire de modification -->
    <form action="index.php?controller=joueurs&action=maj" method="post">
        <h3>Joueur détaillé</h3>
        <hr/>
        <input type="hidden" name="id" value="<?php echo $data["joueur"]->idjoueur ?>" />
        Pseudo : <input type="text" name="pseudo_rl" value="<?php echo $data["joueur"]->pseudo ?>" class="form-control" />
        Rank : <input type="text" name="rankrl_rl" value="<?php echo $data["joueur"]->rankrl ?>" class="form-control" />
        Mmr : <input type="text" name="mmr_rl" value="<?php echo $data["joueur"]->mmr ?>" class="form-control" />
        Email : <input type="text" name="email_rl" value="<?php echo $data["joueur"]->email ?>" class="form-control" />
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