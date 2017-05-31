<?php 

$resultat = ""; // Variable $resultat dans laquelle on va stocker le résultat

function convertisseur($montant, $type){ // Fonction déclarée avec deux paramètres
	if (is_numeric($montant) && $type == 'euro' || $type == 'Euro' || $type == '€' ) { // Vérification is_numeric pour savoir si le montant est bien un nombre, puis  vérification des type de monnaie 
		$resultat = "$montant Dollar(s) valent " . $montant * 0.919240156 . " Euro (au taux de change du 11/05/2017)";
	} // Calcul du taux de change et stockage du résultat dans la variable $resultat

	elseif (is_numeric($montant) && $type == 'dollar' || $type == 'Dollar' || $type == 'dollars' || $type == 'Dollars' || $type == '$' ) {
		$resultat = "$montant Euro(s) valent " . $montant * 1.087855 . " Dollars (au taux de change du 11/05/2017)";	
	}
	//Sensiblement la meme chose ici
	else{
		$resultat = "Erreur de saisie.";
	}
	//En cas d'erreur
	return $resultat;
	//Retour de la variable $resultat
}

 ?>

<!-- Formulaire HTML pour utiliser la fonction -->

<!DOCTYPE html>
<html>
<head>
	<title>
	Exercice 2
	</title>
</head>
	<body>
		<h1>Convertisseur euro -> Dollars</h1>
		<form method="post" action="">
			<label for="montant"></label>
			<input type="number" name="montant" id="montant" placeholder="Montant">
			<label for="type"></label>
			<select name="type" id="type">
				<option value="dollar">Euro vers Dollar(s)</option>
				<option value="euro">Dollar(s) vers Euro</option>
			</select>
			<input type="submit" name="convertir" id="convertir" value="Convertir">
		</form>
	</body>
</html>

<?php 

if ($_POST) {
	echo convertisseur($_POST['montant'],$_POST['type']);
}
// Affichage du resultat en html
 ?>