<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recherche d'une ville</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font: 16px Arial;
    }

    .autocomplete {
      position: relative;
      display: inline-block;
    }

    input {
      border: 1px solid transparent;
      background-color: #f1f1f1;
      padding: 10px;
      font-size: 16px;
    }

    input[type=text] {
      background-color: #f1f1f1;
      width: 100%;
    }

    input[type=submit] {
      background-color: DodgerBlue;
      color: #fff;
      cursor: pointer;
    }

    .autocomplete-items {
      position: absolute;
      border: 1px solid #d4d4d4;
      border-bottom: none;
      border-top: none;
      z-index: 99;
      top: 100%;
      left: 0;
      right: 0;
    }

    .autocomplete-items div {
      padding: 10px;
      cursor: pointer;
      background-color: #fff;
      border-bottom: 1px solid #d4d4d4;
    }

    .autocomplete-items div:hover {
      background-color: #e9e9e9;
    }

    .autocomplete-active {
      background-color: DodgerBlue !important;
      color: #ffffff;
    }

    .loader {
      visibility: hidden;
      border: 10px solid #f3f3f3;
      border-radius: 50%;
      border-top: 10px solid #3498db;
      width: 70px;
      height: 70px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>
<body>

<h2>Recherche d'une ville</h2>

<p>Paramètre :</p>

<!-- Formulaire en PHP -->
<form id="formAutoComplete" method="POST" autocomplete="off">
  <div class="autocomplete" style="width:300px;">
    <input id="dep" type="text" name="Departement" placeholder="Département" value="<?php echo isset($_POST['Departement']) ? htmlspecialchars($_POST['Departement']) : ''; ?>">
    <br />
    <input id="ville" type="text" name="Ville" placeholder="Ville" value="<?php echo isset($_POST['Ville']) ? htmlspecialchars($_POST['Ville']) : ''; ?>">
  </div>
  <br />
  <input type="submit" name="btnEnvoi" value="Envoyer">
</form>

<br />
<div id="load" class="loader"></div>
<br />
<p id="meteo"></p>
<br /><br />
<img id="imgMeteo" style="visibility:hidden" src="" alt="" width="150" height="100">

<?php
// Définir des villes et départements fictifs pour l'exemple
$departements = [
  "01" => ["Ain", "Ville1", "Ville2", "Ville3"],
  "02" => ["Aisne", "Ville4", "Ville5", "Ville6"],
  // Ajouter d'autres départements et villes
];

// Si un département est soumis, on le charge
if (isset($_POST['Departement'])) {
  $dep = $_POST['Departement'];
  
  // Vérifier si le département existe dans le tableau
  if (array_key_exists($dep, $departements)) {
    $villes = $departements[$dep];
  } else {
    $villes = [];
  }
  
  // Afficher la liste des villes correspondantes
  if (!empty($villes)) {
    echo "<h3>Villes dans le département $dep :</h3><ul>";
    foreach ($villes as $ville) {
      echo "<li>" . htmlspecialchars($ville) . "</li>";
    }
    echo "</ul>";
  } else {
    echo "<p>Aucune ville trouvée pour ce département.</p>";
  }
}
?>

</body>
</html>
