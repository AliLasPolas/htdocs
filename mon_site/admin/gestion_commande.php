<?php 
require_once("../inc/init.inc.php");

$resultat = executeRequete("SELECT * FROM commande");
$contenu .= "<h2>Liste des commandes : </h2>";
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
		$contenu .= '<td> <a href="gestion_commande.php?id_commande=' . $ligne['id_commande'] . '"> Modifier les details de la commande </a></td>';
		$contenu .= '</tr>';
	}
	$contenu .= '</table>';

if ($_GET) {
	$contenu .= "<br><h3>Détails de la commande numéro " . $_GET['id_commande'] . "</h3>";
	$resultat = executeRequete("SELECT * FROM details_commande WHERE id_commande = ". $_GET['id_commande']." ");
	$contenu .= '<table border ="1" cellpadding="3"><tr>';
	while ($colonne = $resultat->fetch_field()) {
	$contenu .= '<th>' . $colonne->name . '</th>';
	}
	$contenu .= '</tr>';

	while ($ligne = $resultat->fetch_assoc()) {
		$contenu .= '<tr>';
		foreach ($ligne as $indice => $information) {
			$contenu .= '<td>' . $information . '</td>';

		}
		$contenu .= '</tr>';
	}
	$contenu .= '</table>';

}


require_once("../inc/haut.inc.php");

echo $contenu;

require_once("../inc/bas.inc.php");
 ?>