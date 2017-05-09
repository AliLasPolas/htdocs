<?php 

require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");
if (!internauteEstConnecte()) {
	header("location:connexion.php"); //Si le membre n'est pas connecté, il ne doit pas avoir accès a la page profil
}
//exercice : afficher sur la page profil le pseudo, email, ville, code postal, adresse du membre connecté en passant par le fichier $_SESSION

// echo $_SESSION['membre']['pseudo'] . "<br>" . $_SESSION['membre']['email'] . "<br>" . $_SESSION['membre']['ville'] . "<br>" . $_SESSION['membre']['code_postal'] . "<br>" . $_SESSION['membre']['adresse'] . "<br>";

//debug($_SESSION);  Dès lors que le session_start est inscrit, les sessions sot disponibles sur toutes les pages du site
$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . ' </strong></p>';
$contenu .= '<div class="cadre"><h2>Voici vos informations de profil</h2>';
$contenu .= '<p> Votre email est ' . $_SESSION['membre']['email'] . '<br>';
$contenu .= 'Votre ville est ' . $_SESSION['membre']['ville'] . '<br>';
$contenu .= 'Votre code postal est ' . $_SESSION['membre']['code_postal'] . '<br>';
$contenu .= 'Votre adresse est ' . $_SESSION['membre']['adresse'] . '<br>';
$contenu .= '</p></div>';
echo "$contenu";

require_once("inc/bas.inc.php");
  ?>