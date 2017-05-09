<?php 

if ($_POST) {
	# code...
$pdo = new PDO('mysql:host=localhost;dbname=entreprise','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$result = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire)VALUES ( '$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]', '$_POST[service]', '$_POST[date_embauche]', '$_POST[salaire]')");
echo "$result enregistrement(s) affecté(s) par la requete insert <br>";
}


?>

<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
	<body>
		<form method="post">
			<label for="prenom">Prenom</label>
			<br>
			<input type="text" name="prenom" id="prenom">
			<br><br>
			<label for="prenom">Nom</label>
			<br>
			<input type="text" name="nom" id="nom">
			<br><br>
			<label for="sexe">Sexe</label>
			<br>
			<select name="sexe">
				<option value="f">Femme</option>
				<option value="m">Homme</option>
			</select>
			<br><br>
			<label for="service">Service</label>
			<br>
			<select name="service">
				<option value="commercial">Commercial</option>
				<option value="production">Production</option>
				<option value="secretariat">Secretariat</option>
				<option value="comptabilite">Compabilité</option>
				<option value="direction">Direction</option>
				<option value="informatique">Informatique</option>
				<option value="juridique">Juridique</option>
				<option value="assistant">Assistant</option>
			</select>
			<br><br>
			<label for="date_embauche">Date embauche</label>
			<br>
			<input type="date" name="date_embauche" id="date_embauche">
			<br><br>
			<label for="salaire">Salaire</label>
			<br>
			<input type="number" name="salaire" id="salaire">
			<br><br>
			<button type="submit">Envoi</button>
		</form>
	</body>
</html>

