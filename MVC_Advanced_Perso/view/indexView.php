<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Joueur</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
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
    <?php
        include 'composantView/navBar.php';
    ?>

    <div class="col-lg-7">
        <h3>Joueurs</h3>
        <hr/> 
    </div>
    
    <section class="col-lg-7" style="height: 400px; overflow-y: scroll;">
        <?php foreach($data["joueurs"] as $joueur) { ?>
            <div>
                <?php echo $joueur["pseudo"]; ?> - 
                <?php echo $joueur["rankrl"]; ?> - 
                <?php echo $joueur["mmr"]; ?> - 
                <?php echo $joueur["email"]; ?> 

                <div class="right">
                    <!-- Détail -->
                    <a href="index.php?controller=joueurs&action=detail&id=<?php echo $joueur['idjoueur']; ?>" 
                        class="btn btn-info">
                        Détail
                    </a>

                    <!-- Formulaire de suppression -->
                    <form action="index.php?controller=joueurs&action=delete" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $joueur['idjoueur']; ?>" />
                        <input type="submit" value="Supprimer" class="btn btn-danger" 
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce joueur ?');"/>
                    </form>
                </div>
            </div>
            <hr/>
        <?php } ?>
    </section>

</body>
</html>