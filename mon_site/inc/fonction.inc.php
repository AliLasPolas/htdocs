<?php 

/*---------- FONCTIONS MEMBRES ----------*/
function executeRequete($req){
	global $mysqli; // Permet d'avoir accès a la variable $mysqli définie dans l'espace global a l'interieur de notre fonction (espace local)
	$resultat = $mysqli->query($req); // On execute la requete recue en argument
	if (!$resultat) {
		die("Erreur sur la requete sql.<br> Message : " . $mysqli->error . "<br>Code : " . $req); // Si la requete échoue, on va décéder (die) avec le message d'erreur 
	}
	return $resultat; // On retourne un objet issu de la classe mysqli_result (en cas de requete SELECT, autre requete : true ou false) 
}

//--------------------------------------
// debug($_POST);
function debug($var, $mode = 1){
	echo "<div style='background: orange; padding: 5px; float: right; clear: both;'>";
	$trace = debug_backtrace(); // Fonction prédéfinie retournant un tableau ARRAY contenant des infos tel que la ligne et le fichier ou est exécuté la fonction
	$trace = array_shift($trace); // Extrait le première valeur d'un tableau et la retourne
	echo "Debug demandé dans le fichier : $trace(file) a la ligne $trace[line] . <hr>";
	if ($mode == 1) {
		echo "<pre>"; print_r($var); echo "</pre>";
	}
	else{
		echo "<pre>";var_dump($var); echo "</pre";
	}
	echo "</div>";
}	


//---------------------------------------
function internauteEstConnecte(){ // Cette fonction m'indique si le membre est connecté. (une fonction retourne toujours false par défaut)
	if (!isset($_SESSION['membre'])) { // Si la session membre est non définie (elle ne peux etre que définie si nous sommes passés par la page de connexion avec le bon mdp)
		return false;
	}
	else{
		return true;
	}
}

//-----------------------------------
function InternauteEstAdmin(){ // Cette fonction m'indique si le membre est admin
	if (internauteEstConnecte() && $_SESSION['membre']['statut'] == 1) {// Si la session membre est définie, nous regardons si il est admin, c'est le cas, nous retournons true
		return true;
	}
	return false;
}

//---------- PANIER / COMMANDE / PAIEMENT ---------/
function creationPanier(){
	if (!isset($_SESSION['panier'])) {
		$_SESSION['panier']['titre'] = array();
		$_SESSION['panier']['id_produit'] = array();
		$_SESSION['panier']['quantite'] = array();
		$_SESSION['panier']['prix'] = array();
	}
}
// Soit le panier n'existe pas, on le créé, on retourne TRUE
// Soit le panier existe déja, on retourne directement TRUE



// Cette fonction permet d'ajouter un produit dans le panier 
function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix){
	//Reception d"arguments en provenance du panier.php
	creationPanier();
	//Nous souhaitons savoir si l'id_produit que l'on souhaite ajouter est déja présent dans la session du panier ou non
	$position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']); 
	//Retourne un chiffre si le produit existe
	if ($position_produit != false) {
		$_SESSION['panier']['quantite'][$position_produit] += $quantite;
		//Nous allons précisément a l'indice de ce produit et nous ajoutons la nouvelle quantité
	}
	else{
		//Sinon l'id_poduit du produit n'existe pas dans le panier, on ajout l'id_produit du produit dans un nouvel indice du tableau. Les crochets [] permettent de mettre a l'indice suivant
		$_SESSION['panier']['titre'][] = $titre;
		$_SESSION['panier']['id_produit'][] = $id_produit;
		$_SESSION['panier']['quantite'][] = $quantite;
		$_SESSION['panier']['prix'][] = $prix;
	}
}

//-----------------------------------
function montantTotal(){
	$total = 0;
	for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
		//Tant que $i est inférieur au nombre de produits dans le panier
		$total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
		// On multiplie la quantité par le prix. Ex 1*10€ ou 3*15€ sans remplacer le total précédent de la variable total
	}
	return round($total,2); // Prix total arrondi a 2 chiffres après virgule
}	


// -------------------------------------
function retirerProduitDuPanier($id_produit_a_supprimer){
	$position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']);
	if ($position_produit !== false) {
		array_splice($_SESSION['panier']['titre'], $position_produit, 1);
		array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
		array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
		array_splice($_SESSION['panier']['prix'], $position_produit, 1);
	}
}

 ?>
