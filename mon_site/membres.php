<?php 
require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");

if ($_POST) {
	$erreur = "";
	// if (isset($_POST['pseudo'])) {
	// 	if (strlen($_POST['pseudo']) <= 3 || strlen($_POST['pseudo']) > 20) {
	// 		$erreur .= '<div class="erreur">Erreur taille du pseudo</div>';
	// 	}
	// 	if (!preg_match('#^[a-zA-Z0-9-_.]+$#', $_POST['pseudo'])) {
	// 		$erreur .= '<div class="erreur">Erreur format/caractère pseudo</div>';
	// 	}
	// 	$result = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'"); // Selection du pseudo dans notre BDD
	// 	if ($result->num_rows >= 1) {
	// 		$erreur .= '<div class="erreur">Pseudo indisponible !</div>'; //Le pseudo est déja reservé
	// 	}
	// }
	/*
	
	preg_match() est une focntion prédéfinie permettant de gérer les expressions régulières, elle est toujours entourée de diez afin de préciser les options: 
	"^" indique le début de la chaine / sinon la pourrait commener par autre chose
	"$" indique la fin de la chaine / sinon la chaine pourrait terminer par autre chose
	"+" est la pour dire que les lettres autorisés peuvent aparaitre plusieurs fois / sinon on ne pourrait avoir qu'une seule lettre B par exemple

	*/
	//Controle de la disponibilité du pseudo
	// -------- VALIDATION ET INSCRIPTION DU MEMBRE
	if (empty($erreur)) {
		executeRequete(
			("UPDATE membre SET 
			pseudo = '$_POST[pseudo]',
			nom = '$_POST[nom]',
			prenom = '$_POST[prenom]',
			email = '$_POST[email]',
			civilite = '$_POST[civilite]',
			ville = '$_POST[ville]',
			code_postal = '$_POST[code_postal]',
			adresse = '$_POST[adresse]'
			WHERE id_membre = " . $_SESSION['membre']['id_membre'] . "
			")
			);
		header('Location: boutique.php');

	}
	$contenu .= $erreur;
}

debug($_SESSION);

echo '
<form method="post" action="">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" value=' . $_SESSION['membre']['pseudo'] .' name="pseudo" id="pseudo" maxlength="20" placeholder="Pseudo" pattern="[a-zA-z0-9-_.]{3,20}" title="caractère acceptés : a-zA-Z0-9-_." required=""><br><br>

	<label for="nom">Nom</label><br>
	<input type="text" value=' . $_SESSION['membre']['nom'] . ' name="nom" id="nom" placeholder="Nom"><br><br>
	<label for="prenom">Prénom</label><br>
	<input type="text" value=' . $_SESSION['membre']['prenom'] . ' name="prenom" id="prenom" placeholder="Prenom"><br><br>

	<label for="email">E-Mail</label><br>
	<input type="email" value=' . $_SESSION['membre']['email'] .  ' name="email" id="email"><br><br>

	<label for="civilite">Civilité</label><br>
	<input type="radio" name="civilite" id="civilite" value="m"'; if ($_SESSION['membre']['civilite'] == "m") {echo "checked";}echo'> Homme
	<input type="radio" name="civilite" id="civilite" value="f"'; if ($_SESSION['membre']['civilite'] == "f") {echo "checked";}echo'> Femme
	<br><br>

	<label for="ville">Ville</label><br>
	<input type="text" value=' . $_SESSION['membre']['ville'] .' name="ville" id="ville" title="caractère acceptés : a-zA-Z"><br><br>

	<label for="code_postal">Code Postal</label><br>
	<input type="number" value=' . $_SESSION['membre']['code_postal'] .' name="code_postal" id="code_postal"pattern="[0-9]{5}" title="caractère acceptés : 0-9"><br><br>

	<label for="adresse"> Adresse</label><br>
	<textarea type="text"  name="adresse" placeholder="votre adresse" pattern="[a-zA-Z0-9]{1,20}" title="Caractères acceptés : a-zA-Z0-9 ">' . $_SESSION['membre']['adresse'] .'</textarea><br><br>

	<input type="submit" name="modifier" value="Modifier les infos">
</form>
';
require_once("inc/bas.inc.php");
 ?>