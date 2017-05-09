<?php 
require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");
if ($_POST) {
	//------- Controles et erreurs
	$erreur = "";
	// Controle de la taille du pseudo
	if (strlen($_POST['pseudo']) <= 3 || strlen($_POST['pseudo']) > 20) {
		$erreur .= '<div class="erreur">Erreur taille du pseudo</div>';
	}
	//Controle du format (pseudo)
	if (!preg_match('#^[a-zA-Z0-9-_.]+$#', $_POST['pseudo'])) {
		$erreur .= '<div class="erreur">Erreur format/caractère pseudo</div>';
	}
	/*
	
	preg_match() est une focntion prédéfinie permettant de gérer les expressions régulières, elle est toujours entourée de diez afin de préciser les options: 
	"^" indique le début de la chaine / sinon la pourrait commener par autre chose
	"$" indique la fin de la chaine / sinon la chaine pourrait terminer par autre chose
	"+" est la pour dire que les lettres autorisés peuvent aparaitre plusieurs fois / sinon on ne pourrait avoir qu'une seule lettre B par exemple

	*/
	//Controle de la disponibilité du pseudo
	$result = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'"); // Selection du pseudo dans notre BDD
	if ($result->num_rows >= 1) {
		$erreur .= '<div class="erreur">Pseudo indisponible !</div>'; //Le pseudo est déja reservé
	}
	// -------- VALIDATION ET INSCRIPTION DU MEMBRE
	if (empty($erreur)) {
		//Executez une requete d'iinsertion en BDD et faites des tests de controles
		// $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // Chiffrage du MDP
		executeRequete("
			INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse)
			VALUES(
			'$_POST[pseudo]',
			'$_POST[mdp]',
			'$_POST[nom]',
			'$_POST[prenom]',
			'$_POST[email]',
			'$_POST[civilite]',
			'$_POST[ville]',
			'$_POST[code_postal]',
			'$_POST[adresse]'
			)
			");
		$contenu .= "<div class='validation'>Vous etes inscrit a notre site web. <a href=\"connexion.php\"><u>Cliquez ici pour vous connecter</u></a></div>";
	}
	$contenu .= $erreur;
}
?>
<form method="post" action="">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" name="pseudo" id="pseudo" maxlength="20" placeholder="Pseudo" pattern="[a-zA-z0-9-_.]{3,20}" title="caractère acceptés : a-zA-Z0-9-_." required=""><br><br>

	<label for="mdp">Mot de passe</label><br>
	<input type="password" name="mdp" id="mdp" required="required"><br><br>

	<label for="nom">Nom</label><br>
	<input type="text" name="nom" id="nom" placeholder="Nom"><br><br>
	<label for="prenom">Prénom</label><br>
	<input type="text" name="prenom" id="prenom" placeholder="Prenom"><br><br>

	<label for="email">E-Mail</label><br>
	<input type="email" name="email" id="email" placeholder="exemple@gmail.com"><br><br>

	<label for="civilite">Civilité</label><br>
	<input type="radio" name="civilite" id="civilite" value="m" checked> Homme
	<input type="radio" name="civilite" id="civilite" value="f" checked> Femme
	<br><br>

	<label for="ville">Ville</label><br>
	<input type="text" name="ville" id="ville" placeholder="Ville" title="caractère acceptés : a-zA-Z"><br><br>

	<label for="code_postal">Code Postal</label><br>
	<input type="number" name="code_postal" id="code_postal" placeholder="Code Postal" pattern="[0-9]{5}" title="caractère acceptés : 0-9"><br><br>

	<label for="adresse"> Adresse</label><br>
	<textarea type="text" name="adresse" placeholder="votre adresse" pattern="[a-zA-Z0-9]{1,20}" title="Caractères acceptés : a-zA-Z0-9 "></textarea><br><br>

	<input type="submit" name="inscription" value="S'inscrire">
</form>
<?php 
require_once("inc/bas.inc.php");
echo "$contenu";
// debug($_POST);
?>