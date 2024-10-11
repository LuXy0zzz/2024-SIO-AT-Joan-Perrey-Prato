<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple PHP+PDO+POO+MVC</title>
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
    <form action="index.php?controller=articles&action=maj" method="post">
        <h3>Article détaillé</h3>
        <hr/>
        <input type="hidden" name="id" value="<?php echo $data["article"]->art_id ?>" />
        Nom: <input type="text" name="nom" value="<?php echo $data["article"]->art_nom ?>" class="form-control" />
        Prix: <input type="text" name="prix" value="<?php echo $data["article"]->art_prix ?>" class="form-control" />
        Poid: <input type="text" name="poid" value="<?php echo $data["article"]->art_poid ?>" class="form-control" />
        <input type="submit" value="Modifier" class="btn btn-success"/>
    </form>
    
    <hr/>

<!-- Formulaire de suppression -->
<form action="index.php?controller=articles&action=delete" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
    <input type="hidden" name="id" value="<?php echo $data["article"]->art_id ?>" />
    <input type="submit" value="Supprimer" class="btn btn-danger"/>
</form>

<hr/>

<a href="index.php" class="btn btn-info">Retour</a>

</div>


</body>
</html>