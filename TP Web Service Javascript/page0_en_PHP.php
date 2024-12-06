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
						// lienL du web service
						$url = 'https://geo.api.gouv.fr/departements/'.$dep.'/communes?fields=nom,code,codesPostaux,siren,codeEpci,codeDepartement,codeRegion,population&format=json&geometry=centre';
						
						// file_get_contents c pour obtenir les données JSON
						$response = file_get_contents($url);

						// convertirssement de la réponse JSON en tableau PHP
						$communes = json_decode($response, true);

						// afficher le nombre de commune
						echo '<br>';
						echo 'Nombre de communes : ' . count($communes) . '<br>';
						echo '<br>';

						// afficher les informations sur les communes
						for ($i = 0; $i < count($communes); $i++) {
							echo 'Nom de la commune : ' . $communes[$i]['nom'] . ' -- ';
							echo 'Code de la commune : ' . $communes[$i]['code'] . ' -- ';
							echo 'Code postal de la commune : ' . implode(", ", $communes[$i]['codesPostaux']) . '<br>';
						}
						
					}
				}
			?>

</body>

</html>
