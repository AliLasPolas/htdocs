<?php 

require_once("../inc/init.inc.php");

$condition = 0;
// Suppression d'un membre
if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
	executeRequete("
		DELETE FROM membre WHERE id_membre = '$_GET[id_membre]'
		");
	$_GET['action'] = '';
	$contenu .= '<div class="validation">Le membre a bien été supprimé </div>';
}


// Affichage des membres

$resultat = executeRequete("SELECT * FROM membre");
$contenu .= "<h2>Liste des membres : </h2>";
$contenu .= "Nombre de membres inscrits : " . $resultat->num_rows;
$contenu .= '<table border ="1" cellpadding="3"><tr>';

	while ($colonne = $resultat->fetch_field()) {
		if ($colonne->name != 'mdp') {
		$contenu .= '<th>' . $colonne->name . '</th>';
		}
	}
	$contenu .= '<th>Modification</th>';
	$contenu .= '<th>Suppression</th>';
	$contenu .= '</tr>';

	while ($ligne = $resultat->fetch_assoc()) {
		$contenu .= '<tr>';
		foreach ($ligne as $indice => $information) {
				if ($indice != "mdp") {
				$contenu .= '<td>' . $information . '</td>';
				}
		}
		$contenu .= '<td><a href="?action=modification&id_membre=' . $ligne['id_membre'] . '"><img src="../inc/img/edit.png"></a></td>';
		$contenu .= '<td><a href="?action=suppression&id_membre=' . $ligne['id_membre'] . '" OnClick="return(confirm(\'En etes vous bien certain ?\'));"><img src="../inc/img/delete.png"></a></td>';
		$contenu .= '</tr>';
	}
	$contenu .= '</table>';

	// Update du membre

if (!empty($_POST)) {

	foreach ($_POST as $indice => $valeur) {
		$_POST[$indice] = htmlEntities(addSlashes($valeur));
	}

	executeRequete("
	UPDATE membre SET 
	pseudo = '$_POST[pseudo]', 
	nom = '$_POST[nom]', 
	prenom = '$_POST[prenom]', 
	email = '$_POST[email]', 
	civilite = '$_POST[civilite]', 
	ville = '$_POST[ville]', 
	code_postal = '$_POST[code_postal]',
	adresse ='$_POST[adresse]' WHERE id_membre = '$_GET[id_membre]'");
	$contenu .= '<div class="validation">Le membre a bien été mis a jour </div>';
	$_GET['action'] = 'base';
}


require_once("../inc/haut.inc.php");



if (isset($_GET['action']) && $_GET['action'] == 'modification' ){
	$resultat = executeRequete("SELECT * FROM membre WHERE id_membre = '$_GET[id_membre]'");
	$membre_actuel = $resultat->fetch_assoc();

	$id_membre = (isset($membre_actuel['id_membre'])) ? $membre_actuel['id_membre'] : '';
	$pseudo = (isset($membre_actuel['pseudo'])) ? $membre_actuel['pseudo'] : '';
	$nom = (isset($membre_actuel['nom'])) ? $membre_actuel['nom'] : '';
	$prenom = (isset($membre_actuel['prenom'])) ? $membre_actuel['prenom'] : '';
	$email = (isset($membre_actuel['email'])) ? $membre_actuel['email'] : '';
	$civilite = (isset($membre_actuel['civilite'])) ? $membre_actuel['civilite'] : '';
	$ville = (isset($membre_actuel['ville'])) ? $membre_actuel['ville'] : '';
	$code_postal = (isset($membre_actuel['code_postal'])) ? $membre_actuel['code_postal'] : '';
	$adresse = (isset($membre_actuel['adresse'])) ? $membre_actuel['adresse'] : '';
	echo '<form method="post" action="">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" value="' . $pseudo . '" name="pseudo" id="pseudo" maxlength="20" placeholder="Pseudo" pattern="[a-zA-z0-9-_.]{3,20}" title="caractère acceptés : a-zA-Z0-9-_." required=""><br><br>

	<label for="nom">Nom</label><br>
	<input type="text" name="nom" value="' . $nom . '" id="nom" placeholder="Nom"><br><br>

	<label for="prenom">Prénom</label><br>
	<input type="text" name="prenom" value="' . $prenom . '" id="prenom" placeholder="Prenom"><br><br>

	<label for="email">E-Mail</label><br>
	<input type="email" name="email" value="' . $email . '" id="email" placeholder="exemple@gmail.com"><br><br>

	<label for="civilite">Civilité</label><br>
	<input type="radio" name="civilite" id="civilite" value="m" ';if ($civilite == 'm') {echo "checked";} echo' > Homme
	<input type="radio" name="civilite" id="civilite" value="f" ';if ($civilite == 'f') {echo "checked";} echo' > Femme
	<br><br>

	<label for="ville">Ville</label><br>
	<input type="text" name="ville" value="' . $ville . '" id="ville" placeholder="Ville" title="caractère acceptés : a-zA-Z"><br><br>

	<label for="code_postal">Code Postal</label><br>
	<input type="number" name="code_postal" value="' . $code_postal . '" id="code_postal" placeholder="Code Postal" pattern="[0-9]{5}" title="caractère acceptés : 0-9"><br><br>

	<label for="adresse"> Adresse</label><br>
	<textarea type="text" name="adresse" placeholder="votre adresse" pattern="[a-zA-Z0-9]{1,20}" title="Caractères acceptés : a-zA-Z0-9 ">' . $adresse .'</textarea><br><br>

	<input type="submit" name="modifierMembre" value="Mettre a Jour">
</form>' ;
	// echo $contenu;

}
if (isset($_GET['action']) && $_GET['action'] == 'base' ) {
	echo $contenu;
}
require_once("../inc/bas.inc.php");



 ?>