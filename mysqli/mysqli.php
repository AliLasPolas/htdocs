<?php 
// Mysqli est une classe prédéfinie en php 
$mysqli = new Mysqli("localhost","root","","entreprise");
// Le arguments/paramètres correspondent a 
/*
nom du serveur = localhost
pseudo = root
mot de passe = sous xampp, le mot de passe est vide
nom de la base de données = entreprise

$mysqli est un objet isse de la classe Mysqli, elle nous permet d'etre connecté a la BDD et de formuler des requètes
*/


echo "<pre>";print_r($mysqli);echo "</pre>";

$mysqli->query("mauvaise requete volontaire..........");
echo $mysqli->error . "<br>";
// query() est une fonction/méthode issue de la classe Mysqli qui nous permet de formuler et d'executer des requetes SQL
// La propriété nommée error de l'objet Mysqli nous permet d'avoir accès aux éventuelles erreurs SQL

//$result = $mysqli->query("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire)VALUES ( 'Ali', 'Nizamuddin', 'm', 'informatique', '2017-04-11', '5000');");
echo $mysqli->affected_rows . " enregistrement (s) affecté (s) par la requete INSERT<br>";
var_dump($result);

/*
Dans le cas dun e bonne requete SQL, $result contiendra : (boolean)FALSE

La propriété effected_rows issu de l'objet $mysql permet d'observer le nombre d'enregistrements affectés par une requète
*/

// ----- REQUETE DE MODIFICATION
// Exercice : modifier le salaire de l'employé 350 par 1100

$result = $mysqli->query("UPDATE employes SET salaire = 1100, service = 'nettoyage' WHERE id_employes = 350;");
echo $mysqli->affected_rows . " enregistrement (s) affecté (s) par la requete INSERT<br>";
var_dump($result);

/*
Dans le cas d'une bonne requete sql, $result contiendra : (boolean)TRUE 
Dans le cas d'une mauvaise requete sql, $result contiendra (boolean)FALSE
*/

//-----------------------------
//Requete de suppression
$result = $mysqli->query("DELETE FROM employes WHERE prenom = 'Jean-Pierre'");
echo $mysqli->affected_rows . ' enregistrement affecté par la requet DELETE <br>';
var_dump($result);

/*

Dans le cas d'une bonne requete SQL, $result contiendra :(boolean) TRUE
Dans le cas d'une mauvaise requete SQL, $result contiendra : (boolean) FALSE

*/


//------------------------------------
//Requete de selection
$result = $mysqli->query("SELECT * FROM employes WHERE prenom='Julien'");
$employe = $result->fetch_assoc();
//echo "<pre>";print_r($result);echo "</pre>";
echo "<pre>";print_r($employe);echo "</pre>";

echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";

/*

Nous avons prévu une variable $result juste avant la requete pour avoir un retour
Dans le cas d'une erreur de requete SQL, $result contiendra : (boolean)FALSE 
Dans le cas d'une bonne requete SQL, $result contiendra : (objet) MYSQLI_RESULT si la requete est bonne, on obtient un autre objet issu d'une autre classe (MYSQL_RESULT)

fetch_assoc();
Le résultat sous forme d'objet MYSQLI_RESULT n'est pas exploitable en l'état
La méthode fetch_assoc() issu de la classe MYSQLI_RESULT permet de rendre ce resultat exploitable sous forme de tableau ARRAY associatif

$employe est donc un tableau ARRAY associatif (associatif = avec des clés nominatives)

*/

$result = $mysqli->query("SELECT * FROM employes");
while ($employe = $result->fetch_assoc()) {
	// echo "<pre>";print_r($employe);echo "</pre>";
	echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";

}
	echo $result->num_rows . "enregistrement(s) récupéré(s) par la requete SELECT <br>";

/*

While:
Nous avons plusieurs lignes d'enregistrements, il est donc nécéssaire de répéter le traitement fetch_assoc() afin de rendre le resultat exploitable sous forme d'ARRAY
La boucle while permet d'afficher chaque ligne de la table (tant que l'on possède des enregistrements, on les affiche )

$employe est donc un tableau ARRAY associatif

*/

$resultat = $mysqli->query("SELECT * FROM employes");

echo "<table style='border: 1px solid black; border-collapse: collapse;'><tr>";
while ($colonne = $resultat->fetch_field()) {
	echo "<th style='border: 1px solid black;'>" . $colonne->name . "</th>";
}
echo "</tr>";
while ($ligne = $resultat->fetch_assoc()) {
	echo "<tr>";
	foreach ($ligne as $indic => $informations) {
		echo "<td style='border: 1px solid black;'>" . $informations . "</td>";
	}
	echo "</tr>";
}
echo "</table>";

/*

Pour consuler le nom des champs/colonnes de la taille SQL, nous aurons besoin d'utiliser la method fetch_field() issu de la classe MYSQLI_RESULT qui permet de récolter des informations sur les champs/colonnes

La boucle while est présente pour répéter cette action puisqu'il y a plusieurs champs/colonnes a afficher
On obtient un objet $colonne essu d'une autre classe : stdclass
$colonne->name : perme de récolter les noms des champs de la table

fetch_assoc issu de la classe MYSQLI_RESULT permet de traiter le résultat et le rendre exploitable sous forme de tableau ARRAY

While permet de répéter cette action tant qu'il y a des résultats et de passer a la ligne d'enregistrement suivante pour faire avancer les traitements

La boucle foreach va nous permettre de parcourir notre tableau ARRAY par variable $ligne et d'afficher chacune des informations contenues a l'interieur

En résumé :
La boucle while est présente pour traiter chaque employé (et avancer sur l'employé suivant) tandis que la boucle foreach est présente pour traiter et afficher chaque information pour chaque employé
*/




?>