<!DOCTYPE html>
<html>
<head>
	<title>Mon site</title>
	<link rel="stylesheet" type="text/css" href="/mon_site/inc/css/style.css">
</head>
<body>
	<header>
		<div class="conteneur">
			<span>
				<a href="" title="Mon Site">MonSite.com</a>
			</span>
			<nav>
			<?php 
			if (internauteEstAdmin()) { // Admin uniquement
				echo '<a href="' . URL . 'admin/gestion_membre.php?action=base">Gestion des membres</a>';
				echo '<a href="' . URL . 'admin/gestion_commande.php">Gestion des commande</a>';
				echo '<a href="' . URL . 'admin/gestion_boutique.php">Gestion des boutique</a>';
			}
			if (internauteEstConnecte()) { //Internaute et admin 
				echo '<a href="' . URL . 'profil.php">Voir votre profil</a>';
				echo '<a href="' . URL . 'boutique.php">Accès a la boutique</a>';
				echo '<a href="' . URL . 'panier.php">Voir votre panier</a>';
				echo '<a href="' . URL . 'connexion.php?action=deconnexion">Se déconnecter</a>';
			}
			else{ // Visiteur
				echo '<a href="' . URL . 'inscription.php">S\'inscrire</a>';
				echo '<a href="' . URL . 'connexion.php">Se connecter</a>';
				echo '<a href="' . URL . 'boutique.php">Accès a la boutique</a>';
				echo '<a href="' . URL . 'panier.php">Voir votre panier</a>';
			}
			//Visiteur = 4 liens
			//Membre = 4 liens
			//Admin = 7 liens
			 ?>
			</nav>
		</div>
	</header>
	<section>
		<div class="conteneur">
