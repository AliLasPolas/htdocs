<?php
/*
1. Créer un formulaire permettant de selectionner un fuit et saisir un poids
2. traitement permettant d'afficher le prix en passant par la fonction déclarée calcul()
3. Faites en sorte de garder le dernier fruit selectionné et le dernier poids saisie dans le formulaire lorsqu'il est validé
*/
include("fonction.inc.php");
if($_POST)
{
	echo calcul($_POST['fruits'],$_POST['poids']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire fruit</title>
	<style>
		label{float: left; width: 95px; font-style: italic; font-family: Calibri;}
		h1{margin: 0 0 10px 200px; font-family: Calibri;}
	</style>
</head>
	<body>
		<hr>
		<h1>Formulaire fruits</h1>
		<form method="post" action=""><!-- method : comment vont circuler les données ? - action: url de destination -->
			<label for="prenom">Fruits</label>
			<select name="fruits">
				<option value="cerises" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == "cerises") echo "selected"; ?>>Cerises</option>
				<option value="bananes" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == "bananes") echo "selected"; ?>>Bananes</option>
				<option value="peches" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == "peches") echo "selected"; ?>>Pêches</option><!-- SI il y a un fruit selectionné dans le formaulaire et que le fruit selectionné est "peches", selectionne le fruit peches -->
				<option value="pommes" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == "pommes") echo "selected"; ?>>Pommes</option>
			</select><br><!-- il ne faut surtout pas oublier les name sur le formulaire HTML -->
			<br>
			<label for="poids">Poids</label>
			<input id="poids" name="poids" value="<?php if(isset($_POST['poids'])) echo $_POST['poids']; ?>"><br><!-- il ne faut surtout pas oublier les name sur le formulaire HTML -->
			<br>
			<input type="submit" value="calculer">
		</form>
	</body>
<html>