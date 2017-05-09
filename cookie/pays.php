<?php 

/*

Un cookie est un fichier sauvegardé sur l'ordinateur de l'internaute avec des informations a l'interieur
Les informations contenue ne son,t pas sensibles (pas de mot de passe ni rien), ils s'agit en général des préférences .
Exemple : langue dans laquelle l'internaute souhaite visiter le site, derniers pruduits consiltés dans une boutique, etc...

Exercice : effectuer des liens pointant sur la meme page dabs une liste ul li pour 4pays : France, Espagne, Italie, Angleterre

*/

 ?>


<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
	<body>
		<ul>
			<li><a href="pays.php?pays=france">France</a></li>
			<li><a href="pays.php?pays=italie">Italie</a></li>
			<li><a href="pays.php?pays=angleterre">Angleterre</a></li>
			<li><a href="pays.php?pays=espagne">Espagne</a></li>
		</ul>
	</body>
</html>

<?php 
if (isset($_GET['pays'])) {
	$pays = $_GET['pays'];
} // Si un pays est passé dans l'url, c'est que nous avons cliqué sur ce lien
else if(isset($_COOKIE['pays'])){
	$pays = $_COOKIE['pays'];
} // On ne rentre dans le elseif que si la if n'est pas passée et que le cookie existe
else{
	$pays = 'france';
} // On ressort par défaut la variable pays affectée a france
$un_an = 365*24*3600; // Cookie en seconde pour un an
setCookie("pays",$pays,time()+$un_an); // setCookie est une fonction prédéfinie permettant de créer un cookie, elle recoit 3 arguments : le nom du cookie, le contenu du cookie et la durée de vie du cookie
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";
// Exercice : afficher grace a une condition switch une phrase en fonction du lien cliqué
	switch ($pays) {
		case 'france':
		echo "Vous vivez en france";
		break;
			case 'angleterre':
		echo "God saves the queen";
		break;
			case 'espagne':
		echo "Vivas las espagnas";
		break;
			case 'italie':
		echo "Italianos google traductianos";
		break;
	
		default:
		echo "01001010 01100101 00100000 01101110 01100101 00100000 01100011 01101111 01101101 01110000 01110010 01100101 01101110 01100100 01110011 00100000 01110000 01100001 01110011";
		break;
	}
?>