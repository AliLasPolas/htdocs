<?php 

include("fonction.inc.php")

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<a href="lien_fruit.php?fruit=bananes">Bananes</a>
 	<a href="lien_fruit.php?fruit=cerises">Cerises</a>
 	<a href="lien_fruit.php?fruit=pommes">Pommes</a>
 	<a href="lien_fruit.php?fruit=peches">Peches</a>
 	<br><br>
 </body>
 </html>

 <?php 

/*

Exercice :
1. Effectuer 4 liens HTML pointant sur la meme page avec le nom des fruits.
2. Faites en sorte d'envoyer "cerises" dans l'URL si l'on clique sur le lien "cerises"
3. Tenter d'afficher "cerises" sur la page web si l'on a cliqué dessus (si "cerise est passé dans l'URL par conséquent")

*/



if ($_GET) {
	echo "Votre fruit est " . $_GET["fruit"] . "<br>";
	echo calcul($_GET["fruit"], 1000);
}

 ?>