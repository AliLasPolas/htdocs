<?php 
if (!$_GET) {
	header('Location: exo_3.php');
}
$mysqli = new Mysqli("localhost","root","","exercice_3"); // Au cas ou un petit malin ouvrait la page hors de son contexte défini, il serait redirigé vers exo_3.php
$resultat = $mysqli->query("SELECT * FROM movies WHERE id_film =" . $_GET['id_film'] . " ");
/*Ouverture de mysqli et selection de la base, selection de la table movies*/
$contenu = "";
$contenu .= '<table " border ="1"><tr>';
/* Boucle d'assignation des champs sous forme de tableau, utilisation d'un switch pour faire corresppndre les équivalents francais aux indices anglais imposés */
	while ($colonne = $resultat->fetch_field()) {
			$contenu .= '<th>'; 
			switch ($colonne->name) {
				case 'id_film':
					$contenu.= "Numéro du film";				
					break;				
				case 'title':
					$contenu.= "Nom du film";				
					break;
				case 'actors':
					$contenu.= "Acteurs";				
					break;
				case 'director':
					$contenu.= "Réalisateur";				
					break;
				case 'year_of_prod':
					$contenu.= "Année de sortie";				
					break;
				case 'producer':
					$contenu.= "Producteur";				
					break;
				case 'language':
					$contenu.= "Langue";				
					break;
				case 'category':
					$contenu.= "Catégorie";				
					break;
				case 'storyline':
					$contenu.= "Synopsis";				
					break;
				case 'video':
					$contenu.= "Lien de la bande-annonce";				
					break;
				}
			$contenu .= '</th>';
	}
	$contenu .= '</tr>';

	/* Affichage des information du tableau */
	while ($ligne = $resultat->fetch_assoc()) {
		$contenu .= '<tr>';
		foreach ($ligne as $indice => $information) {
			if ($indice == 'video') {
				$contenu .= '<td><a href="' . $information . '">' . $information . '</a></td>';
			}
			else{	
				$contenu .= '<td>' . $information . '</td>';
			}

		}
		$contenu .= '</tr>';
	}
	$contenu .= '</table>';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Fiche du film </h1>
	<?php 
		echo $contenu;
	 ?>
</body>
</html>