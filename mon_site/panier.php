<?php 

require_once("inc/init.inc.php");
// ---------- TRAITEMENT PHP ---------//
// ---------- AJOUT PANIER ---------//
if (isset($_POST['ajout_panier'])) {
	$resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_POST[id_produit]'");
		$produit = $resultat->fetch_assoc();
		ajouterProduitDansPanier($produit['titre'],$_POST['id_produit'],$_POST['quantite'],$produit['prix']);
}


//----------- VIDER PANIER ----------//
if (isset($_GET['action']) && $_GET['action'] == 'vider') {
	unset($_SESSION['panier']);
}

//---------- PAIEMENT -----------//
if (isset($_POST['payer'])) {
	for ($i=0; $i < count($_SESSION['panier']['id_produit']) ; $i++) { 
		$resultat = executeRequete("SELECT * FROM produit WHERE id_produit =" . $_SESSION['panier']['id_produit'][$i]);
		$produit = $resultat->fetch_assoc();
		if($produit['stock'] < $_SESSION['panier']['quantite']['$i']){
			$contenu .= '<hr><div class="erreur">Stock restant';
			$produit['stock'] . "</div>";
			$contenu .= '<div class = "erreur">Quantité demandé ' . $_SESSION['panier']['quantite'][$i] . '</div>';
			if ($produit['stock'] > 0) {
				$contenu .= '<div class="erreur">La quantité du produit '. $_SESSION['panier']['quantite'][$i] .'a été réduite car notre stock était insuffisant, veuillez vérifier vos achats</div>';
				$_SESSION['panier']['quantite'][$i] = $produit['stock'];
			}
			else{
				$contenu .= '<div class="erreur">Le produit ' . $_SESSION['panier']['id_produit'][$i] . ' a été retiré de votre panier car nous sommes en rupture de stock, veuillez vérifier vos achats </div>';
			}
		}
	}
}

// debug($_SESSION);
// ---------- AFFICHAGE HTML ---------- //
require_once("inc/haut.inc.php");


echo "<table border='1' style='border-collapse:collapse;' cellpadding='7'>";
echo "<tr><td colspan='5'>Panier</td></tr>";
echo "<tr><th>Titre</th><th>Produit</th><th>Quantité</th><th>Prix Unitaire</th><th>Action</th></tr>";
if (empty($_SESSION['panier']['id_produit'])) {
	echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
}
else{
	for ($i=0; $i < count($_SESSION['panier']['id_produit']); $i++) { 
		echo "<tr>";
		echo "<td>" . $_SESSION['panier']['titre'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['id_produit'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['quantite'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['prix'][$i] . "</td>";
		echo "</tr>";
	}
	echo "<tr><th colspan='3'>Total</th><td colspan='2'>" . montantTotal() . "</td></tr>";
	if (internauteEstConnecte()) {
		echo '<form method="post" action="">';
		echo '<tr><td colspan="5"><input type="submit" name="payer" value="Valider et déclarer le paiement"></td></tr>';
		echo '</form>';
	}
	else{
		echo '<tr><td colspan="5">Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> afin de  pouvoir payer</td></tr>';
	}
	echo "<tr><td colspan='5'><a href='?action=vider'>Vider mon panier</a></td></tr>";
}
echo "</table>";
echo "<i>Règlement par chèque uniquement a l'adresse suivante : 45 rue des vielles tuilleries 78950 GAMBAIS</i>";

require_once("inc/bas.inc.php");

 ?>