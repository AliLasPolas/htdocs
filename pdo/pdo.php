<?php 

/*

PDO est une classe prédéfinie de PHP permettant la connexion et l'éxécution de requete sur la SGBD en PHP

*/

$pdo = new PDO('mysql:host=localhost;dbname=entreprise','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

/*

Arguments/paramètres : 
1.host = nom du serveur = localhost
2.dbname = nom de la base de données = entreprise
3.pseudo = root
4.mdp = vide sous pc et root pour mac
5 options = erreurs mode activé pour faire apparaitre d'éventuelles erreurs de requete SQL, encodage en utf8 dans la bdd

$pdo est une variable représentant un objet issu de la classe PDO
$pdo permet d'etre connecté a la base et de formuler des requetes sql

*/

echo "<pre>";print_r($pdo);echo "</pre>";

//---------------------------------------
//--REQUETE D'INSERTION
//$result = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire)VALUES ( 'Juan', 'Huevo', 'm', 'informatique', '2017-04-11', '5000')");

//echo "$result enregistrement(s) affecté(s) par la requete insert <br>";

/*

Exec() est une methode issue de la classe PDO qui permet de formuler et d'executer des requetes SQL
Dans le cas d'une erreur de requete SQL : boolean FALSE
Dans le cas d'une bonne requete SQL : (INT) 1 ou N selon le nombre de résultats touchés par la requete

*/

//------------------------------------
//Requete de modification
// Exercice : Modifier ke service de l'employé 547 par "direction"

$result = $pdo->exec("UPDATE employes SET service = 'direction' WHERE id_employes = 547");
echo "$result enregistrement(s) affecté(s) par la requete updtae <br>";


//------------------------------------
//Requete de suppresion
//Exercice: Supprimer les employes faisant partie de la direction

$result = $pdo->exec("DELETE FROM employes WHERE service = 'direction'");
echo "$result enregistrement(s) affecté(s) par la requete delete <br>";


//---------------------------------
//------- REQUETE DE SELECTION
$result = $pdo->query("SELECT * FROM employes WHERE nom = 'Chevel'");
$employes = $result->fetch(PDO::FETCH_ASSOC);
echo "<pre>";print_r($employes);echo "</pre>";

// Afficher le meme résultat que le print_r() en passant par le tableau ARRAY $employes

foreach ($employes as $key => $value) {
	echo $key . " : " . $value . "<br>";
}

/*

Nous avons prévu une variable $result juste avant la requete pour obtenir un retour
Dans le cas d'une erreur de requete SQL , $result contiendra : (boolean)FALSE
Dans le cas d'une bonne requete SQL , $result contiendra : un autre objet issu d'une autre classe PDOSTATEMENT

fetch(PDO::FETCH_ASSOC) permet de rendre exploitable un resultat sous forme de tableau ARRAY associatif

$employe est donc un tableau ARRAY associatif

*/

//Exercice selectionner toute la table employes 
// A l'aide d'une boucle while afficher successivement la phrase : 
// Bonjour je suis PRENOM NOM du service SERVICE

$result = $pdo->query("SELECT * FROM employes");
while ($employe = $result->fetch(PDO::FETCH_ASSOC)) {
	echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";
	}

echo $result->rowCount() . "enregistrement récupéré par la requete SELECT";

/*

Nous utilisons une boucle while parce que nous avons plusieurs lignes d'enregistrement a récupérer 
fetch(PDO::FETCH_ASSOC) permet de rendre exploitable un resultat sous forme de tableau ARRAY associatif

rowCount() est une méthode issue de la classe PDOSTATEMENT permettant d'observer le nombre d'enregistrements récupérés et affichés par une requete


*/

$result = $pdo->query("SELECT * FROM employes");
echo '<table style="border: 1px solid #000; border-collapse: collapse;"><tr>';
for ($i=0; $i < $result->columnCount() ; $i++) { 
	$colonne = $result->getcolumnmeta($i);
		echo "<th style='border: 1px solid #000;'>" . $colonne['name'] . "</th>";
}
echo "<tr>";
while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
	echo "<tr style='border: 1px solid #000;''>";
	foreach ($ligne as $indice => $informations) {
		echo "<td style='border: 1px solid #000;''>" . $informations . "</td>";
	}
	echo "</tr>";
}
echo "</table>";

/*

columnCount() nous permettra de savoir combien il y a de champs/colonnes au total

la boucle for est donc présente pour répéter l'action d'affichage et le traitement puisqu'il y a plusieurs champs/colonnes de la table SQL, nous utiliserons la méthode des informations sur les champs/colonnes

$colonne est donc un tableau ARRAY

*/