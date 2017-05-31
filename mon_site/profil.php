<?php 

require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");
if (!internauteEstConnecte()) {
	header("location:connexion.php"); //Si le membre n'est pas connecté, il ne doit pas avoir accès a la page profil
}
//exercice : afficher sur la page profil le pseudo, email, ville, code postal, adresse du membre connecté en passant par le fichier $_SESSION

// echo $_SESSION['membre']['pseudo'] . "<br>" . $_SESSION['membre']['email'] . "<br>" . $_SESSION['membre']['ville'] . "<br>" . $_SESSION['membre']['code_postal'] . "<br>" . $_SESSION['membre']['adresse'] . "<br>";

//debug($_SESSION);  Dès lors que le session_start est inscrit, les sessions sot disponibles sur toutes les pages du site
if ($_GET) {
	if ($_GET['action'] == 'supprimer') {
		executeRequete("DELETE FROM membre WHERE id_membre = " . $_SESSION['membre']['id_membre'] ." ");
		session_destroy();
		header('Location: boutique.php');
	}

			executeRequete("DELETE FROM commande WHERE id_commande = " . $_GET['id_commande'] ." ");
			executeRequete("DELETE FROM details_commande WHERE id_commande = " . $_GET['id_commande'] ." ");
		}
		$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . ' </strong></p>';
		$contenu .= '<div class="cadre"><h2>Voici vos informations de profil</h2>';
		$contenu .= '<p> Votre email est ' . $_SESSION['membre']['email'] . '<br>';
		$contenu .= 'Votre ville est ' . $_SESSION['membre']['ville'] . '<br>';
		$contenu .= 'Votre code postal est ' . $_SESSION['membre']['code_postal'] . '<br>';
		$contenu .= 'Votre adresse est ' . $_SESSION['membre']['adresse'] . '<br>';
		$contenu .= '</p></div>';

		$resultat = executeRequete("SELECT * FROM commande WHERE id_membre = " . $_SESSION['membre']['id_membre'] . " ");
		debug($_SESSION);
		$contenu .= "<h2>Liste des commandes du membre : </h2>";
		$contenu .= "Nombre de commandes : " . $resultat->num_rows;
		$contenu .= '<table border ="1" cellpadding="3"><tr>';
		while ($colonne = $resultat->fetch_field()) {
			$contenu .= '<th>' . $colonne->name . '</th>';
		}
		$contenu .= '<th>Details</th>';
		$contenu .= '</tr>';

		while ($ligne = $resultat->fetch_assoc()) {
			$contenu .= '<tr>';
			foreach ($ligne as $indice => $information) {
				$contenu .= '<td>' . $information . '</td>';

			}
			$contenu .= '<td> <a href="profil.php?id_commande=' . $ligne['id_commande'] . '"> Supprimmer la commande </a></td>';
			$contenu .= '</tr>';
	}
	$contenu .= '</table>';


$contenu .= "<br><br><h3><a href='membres.php'>Modifier les détails du membre</a></h4>";

$contenu .= "<br><br><h3><a href='profil.php?action=supprimer'> Supprimer le compte</a></h4>";

echo "$contenu";

require_once("inc/bas.inc.php");
  ?>