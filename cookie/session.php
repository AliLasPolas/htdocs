<?php 
/*
Une session est un système mis en oeuvre dans le code php permettant de conserver sur le serveur, dans un fichier temporaire, des informations relatives a un internaute

L'avantage d'une session c'est que les données seront enregistrées dans un fichier sur le serveur disponible et consultable par toutes les pages durant la navigation de l'internaute
*/

session_start(); //¨Permet de créer un fichier session ou de l'ouvrir si il existe déja
$_SESSION["pseudo"] = "LasPolas";
$_SESSION["nom"] = "Nizamuddin";

// Pour rappel, $_SESSION est une superglobale de type ARRAY
//echo "<pre>";print_r($_SESSION);echo "</pre>";

unset($_SESSION['nom']);
unset($_SESSION['pays']);
echo "<pre>";print_r($_SESSION);echo "</pre>";

session_destroy();
?>
