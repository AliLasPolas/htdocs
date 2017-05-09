<?php 
require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");
if (isset($_GET['action']) && $_GET['action'] == "deconnexion") {
	session_destroy();
}
if (internauteEstConnecte()) { // Si l'internaute est déja connecté, il n'y a rien a faire ici, nous le redirigeons vers son profil. De cette manière, nous affichons le formulaire de connexion uniquement si il n'est pas connecté
	header("location:profil.php");
}
if ($_POST) {
	$resultat = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' ");
	if ($resultat->num_rows != 0) {
		$membre = $resultat->fetch_assoc();
		if ($membre['mdp'] == $_POST['mdp']) { //if (password_verify($_POST['mdp'],$membre['mdp']))
			foreach ($membre as $indice => $element) {
				if ($indice != 'mdp') {
					$_SESSION['membre'][$indice] = $element; //Nous créons une session avec les éléments provenants de la BDD
				}
			}
		header("location:profil.php"); // Le pseudo, le mdp étant correct, nous l'envoyons sur son profil
		}
		else{
		$contenu .= '<div class="erreur">Erreur de Mot de Passe</div>';
		}
	}
	else{
		$contenu .= '<div class="erreur">Erreur de Pseudo</div>';
	}
echo "$contenu";
// debug($_SESSION);
}

 ?>

<form method="post">
	<label for="pseudo"> Pseudo</label><br>
	<input type="text" name="pseudo" id="pseudo"><br><br>
	<label for="mdp">Mot de Passe</label><br>
	<input type="password" name="mdp" id="mdp"><br><br>
	<input type="submit" name="connexion" id="connexion" value="Se connecter">
</form>

 <?php 
require_once("inc/bas.inc.php");
  ?>