<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ville App</title>
</head>

<body>
	<div id="form-section">
		<form method="POST" action="">
			<label for="CP">Code postal:</label>
			<input type="number" id="CP" name="CP" required>
			<button type="submit" name="submit">Recevoir les communes</button>
		</form>
	</div> 


	</div>
			<?php
				if (isset($_POST['submit'])) { // test
					$dep = $_POST['CP'];

					if ($dep <= 0) {
						echo "Veuillez entrer un nombre valide.";
					} else {
						// 1. URL du web service
						$url = 'https://geo.api.gouv.fr/departements/'.$dep.'/communes?fields=nom,code,codesPostaux,siren,codeEpci,codeDepartement,codeRegion,population&format=json&geometry=centre';
						
						// 2. Utiliser file_get_contents pour obtenir les données JSON
						$response = file_get_contents($url);

						// 3. Convertir la réponse JSON en tableau PHP
						$communes = json_decode($response, true);

						// 4. Afficher le nombre de communes
						echo '<br>';
						echo 'Nombre de communes : ' . count($communes) . '<br>';
						echo '<br>';

						// 5. Afficher les informations sur les communes
						foreach ($communes as $commune) {
							echo 'Nom de la commune : ' . $commune['nom'] . ' -- ';
							echo 'Code de la commune : ' . $commune['code'] . ' -- ';
							echo 'Code postal de la commune : ' . implode(", ", $commune['codesPostaux']) . '<br>';
						}
					}
				}
			?>

</body>

</html>
