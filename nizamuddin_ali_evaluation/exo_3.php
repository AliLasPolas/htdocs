<?php 
$mysqli = new Mysqli("localhost","root","","exercice_3"); // On charge la base de données avec Mysqli. La base de données se trouve etre en fichier séparé exercice_3.sql pour la lisibilité (prières de la charger avant de démarrer le site)

$erreur = ""; // La fameuse variable erreur qui contiendra les erreurs de formulaire éventuelles et permettra la vérification de celles-ci
$contenu = ""; // La fameuse variable contenu qui contient le contenu variable de la page

if ($_POST) {
	if (iconv_strlen($_POST['title']) < 5) {
		$erreur .= "<div class='erreur'>Veuillez renseigner le titre</div> <br>";
	}
	if (iconv_strlen($_POST['actors']) < 5) {
		$erreur .= "<div class='erreur'>Veuillez renseigner le nom des acteurs</div> <br>";
	}
	if (iconv_strlen($_POST['director']) < 5) {
		$erreur .= "<div class='erreur'>Veuillez renseigner le nom du directeur</div> <br>";
	}
	if (iconv_strlen($_POST['producer']) < 5) {
		$erreur .= "<div class='erreur'>Veuillez renseigner le nom du producteur</div> <br>";
	}
	if (iconv_strlen($_POST['storyline']) < 5) {
		$erreur .= "<div class='erreur'>Veuillez renseigner le synopsis</div> <br>";
	}
	if (filter_var($_POST['video'], FILTER_VALIDATE_URL) === FALSE){
		$erreur .= "<div class='erreur'> Veuillez renseigner l'url de la bande annonce</div> <br>";
	}
	//Vérifications des tailles de chaines de caractères avec iconv_strlen et vérification de l'URL avec filter_var

	if (iconv_strlen($erreur) == 0) {
		echo "<br><br><div class='validation'>La base de données a bien été mise a jour</div>";
			/*Requete d'insertion*/
			$requete = "INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) 
							VALUES (
							'$_POST[title]',
							'$_POST[actors]',
							'$_POST[director]',
							'$_POST[producer]',
							'$_POST[year_of_prod]',
							'$_POST[language]',
							'$_POST[category]',
							'$_POST[storyline]',
							'$_POST[video]'
							)";

			$resultat = $mysqli->query($requete); // On execute la requete recue en argument en utilisant les variables de la superglobale $_POST
			if (!$resultat) {
				die("Erreur sur la requete sql.<br> Message : " . $mysqli->error . "<br>Code : " . $requete); // Si la requete échoue, on va décéder (die) avec le message d'erreur 
				echo $mysqli->error . "<br>"; 
				echo $mysqli->affected_rows . " enregistrement (s) affecté (s) par la requete INSERT<br>";
				var_dump($resultat);
		}
	}
}
echo $erreur;
				// Affichage du message d'erreur (vide si tout se passe bien)



 ?>
<!-- FORMULAIRE HTML -->
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Exercice 3</title>
 	<style type="text/css">
 		table{
 			 width: 45vw;
 		}
 		.erreur{
 			background-color: red;
 		}
 		.validation{
 			background-color: green;
 		}
 	</style>
 </head>
 <body>
 <h1>Banque de films de WebForce3</h1>
 <section>
 	<h2>Ajout d'un film</h2>
 	<form method="post" action="">
		<label for="title"> Titre </label><br>
		<input type="text" name="title" id="title"><br><br>

		<label for="actors"> Acteurs </label><br>
		<input type="text" name="actors" id="actors"><br><br>

		<label for="director"> Directeur </label><br>
		<input type="text" name="director" id="director"><br><br>

		<label for="producer"> Producteur </label><br>
		<input type="text" name="producer" id="producer"><br><br>

		<label for="year_of_prod"> Année de production </label><br>
		<select name="year_of_prod">
		<!-- Boucle for qui me permet d'afficher toutes les années depuis 1920 a aujourd'hui -->
			<?php 
				for ($i=0; $i <= 97; $i++) {
					echo "<option value='" . (1920+$i) . "'>" . (1920 + $i) ."</option>";
				} 
			 ?>
		</select><br><br>

		<label for="language"> Langue </label><br>
		<select name="language">
			<option value="Francais">Francais</option>
			<option value="Italien">Italien</option>
			<option value="Espagnol">Espagnol</option>
			<option value="Anglais">Anglais</option>
			<option value="Japonais">Japonais</option>
		</select><br><br>

		<label for="category"> Catégorie </label><br>
		<select name="category">
			<option value="Action">Action</option>
			<option value="Drama">Drama</option>
			<option value="Comedie">Comédie</option>
			<option value="Metafiction" selected>Métafiction</option>
			<option value="Autre">Autre</option>
		</select><br><br>

		<label for="storyline"> Synopsis </label><br>
		<textarea name="storyline" placeholder="Synopsis"></textarea><br><br>

		<label for="video"> Bande Annonce </label><br>
		<input type="text" name="video" id="video"><br><br>

		<input type="submit" name="envoi" value="Envoi">
 	</form>
 </section>
 <section>
 	<h2>Affichage des films disponibles</h2>
 	<!-- Requete de selection -->
 	<?php 
	$resultat = $mysqli->query("SELECT * FROM movies");
	if (!$resultat) {
		die("Erreur sur la requete sql.<br> Message : " . $mysqli->error);
		echo $mysqli->error . "<br>";
		var_dump($resultat);
	}
	else{
		/* Affichage de la requete de séléction sous forme de tableau si pas d'erreur*/ 
	$contenu .= "<h3>Liste des films : </h2>";
	$contenu .= "Nombre de films : " . $resultat->num_rows;
	$contenu .= '<table border ="1"><tr>';
	/*BOUCLE DES CHAMPS TH*/
		while ($colonne = $resultat->fetch_field()) {
			if ($colonne->name == 'title' || $colonne->name == 'director' || $colonne->name == 'year_of_prod' ) {
			$contenu .= '<th>'; 
			switch ($colonne->name) {
				case 'title':
					$contenu.= "Nom du film";				
					break;
				case 'director':
					$contenu.= "Réalisateur";				
					break;
				case 'year_of_prod':
					$contenu.= "Année de sortie";				
					break;
			}
			
			$contenu .= '</th>'; //Affichage uniquement des champs "title", "director" et "year_of_prod", sous forme de "Directeur, "Nom du film" et "Année"
			}
		}
		$contenu .= "<th>Plus d'infos</th>";
		$contenu .= '</tr>';

		/*BOUCLE DES INFORMATIONS TD*/
		while ($ligne = $resultat->fetch_assoc()) {
			$contenu .= '<tr>';
			foreach ($ligne as $indice => $information) {
				if ($indice == 'title' || $indice == 'director' || $indice == 'year_of_prod' ) {
				$contenu .= '<td>' . $information . '</td>';
				}
			}
			$contenu .= "<td><a href=exo_3_fiche.php?id_film=" . $ligne['id_film'] . " >Détails</a></td>"; // lien dynamique vers la page de la fiche films
			$contenu .= '</tr>';
		}
		$contenu .= '</table>';
	}
	echo $contenu; // Affichage du contenu

 	 ?>
 </section>
 </body>
 </html>

