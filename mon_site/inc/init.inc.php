<?php 
$mysqli = new Mysqli("localhost","root","","monsite");
if($mysqli->connect_error)die("Un problème est survenu lors de la tentative de connection a la BDD : " . $mysqli->connect_error);
// SESSION

session_start();

//CHEMIN
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . "/mon_site/");
define("URL",'http://localhost/mon_site/');

// VARIABLES
$contenu = '';

// AUTRES INCLUSIONS
require_once("fonction.inc.php")
 ?>