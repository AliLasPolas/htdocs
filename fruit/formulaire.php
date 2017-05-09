 <?php 
include("fonction.inc.php");
/*
1. Créer un formulaire permettant de séléctionner un fruit et saisir un poids
2. 
*/


if ($_POST) {
	session_start();
	$_SESSION["fruit"] = $_POST["fruit"];
	$_SESSION["poids"] = $_POST["poids"];
	echo calcul($_POST["fruit"], $_POST["poids"]);
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form method="post">
 		<select name="fruit" default>
 			<option value="cerises" <?php if ($_POST) {if($_POST["fruit"] == "cerises"){echo "selected";}} ?>>Cerises</option>
 			<option value="bananes" <?php if ($_POST) {if($_POST["fruit"] == "bananes"){echo "selected";}} ?>>Bananes</option> 
 			<!-- Si i ly a un fruit séléctionné dans le formulaire et que le fruit séléctionné est "peches", alors on selectionne le fruit peche -->
 			<option value="pommes" <?php if ($_POST) {if($_POST["fruit"] == "pommes"){echo "selected";}} ?>>Pommes</option>
 			<option value="peches" <?php if ($_POST) {if($_POST["fruit"] == "peches"){echo "selected";}} ?>>Peches</option>
 		</select>
 		<input type="number" name="poids" placeholder="Poids" value="<?php echo $_SESSION["poids"]; ?>">
 		<button type="submit">Calcul</button>
 	</form>
 </body>
 </html>

