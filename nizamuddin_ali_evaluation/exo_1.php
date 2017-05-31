<!DOCTYPE html>
<html>
<head>
	<title>Exercice numero 1</title>
</head>
	<body>

	<!-- FORMULAIRE HTML -->
		<form method="post" action="">
			<label for="prenom"> Prénom </label><br>
			<input type="text" name="prenom" id="prenom"><br><br>

			<label for="nom"> Nom </label><br>
			<input type="text" name="nom" id="nom"><br><br>

			<label for="adresse"> Adresse </label><br>
			<input type="text" name="adresse" id="adresse"><br><br>

			<label for="code_postal"> Code Postal </label><br>
			<input type="number" name="code_postal" id="code_postal"><br><br>

			<label for="Ville"> Ville </label><br>
			<input type="text" name="ville" id="ville"><br><br>

			<label for="email"> Courriel </label><br>
			<input type="mail" name="courriel" id="courriel"><br><br>

			<label for="telephone"> Téléphone </label><br>
			<input type="number" name="telephone" id="telephone"><br><br>

			<label for="date_de_naissance"> Date de naissance </label><br>
			<input type="date" name="date_de_naissance" id="date_de_naissance"><br><br>

			<input type="submit" name="valider" value="Valider">
		</form>
	</body>
</html>

<!-- PARTIE PHP -->

<?php 

if ($_POST) { // Lancement tu traitement PHP lors de la validation de l'utilisateur
	$date = new DateTime($_POST['date_de_naissance']); // Application de la classe DateTime a la date de naissance pour gratter les point bonus
	echo "<ul>";//Ouverture de la liste non-ordonnée
	foreach ($_POST as $indice => $valeur) { // Boucle foreach pour afficher les indices et valeurs. Il est aussi possible d'utiliser d'autres boucles
		if ($indice == "date_de_naissance" ) { //Traitement particulier de la date de naissance qui doit etre affichée au format européen
			echo "<li>" . ucfirst($indice) . " : " . $date->format('d-m-Y H:i:s') . "</li>"; // Utilisation de la propriété format de la classe date pour le format européen
		}
		else{	
			echo "<li>" . ucfirst($indice) . " : $valeur</li>"; // utilisation de ucfirst pour passer les indices avec des majuscules		
		}
	}
	echo "<ul>";
}

 ?>