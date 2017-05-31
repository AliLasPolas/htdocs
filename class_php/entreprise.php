<!-- 
Créé un Class Entreprise
Propriété (private) :	- Nom (varchar 20)
			- Logo (varchar 255)
			- Rue (varchar 150)
			- Code Postal (varchar 5)
			- Ville (varchar 50)
			- Taille (int 5) -> Nombre d'employe
            - Date de creation (int 4) -> Annee de création
			
Methode (public) :	- Getter/Setter
			- FicheSociete()
			- Comparaison($societe2) -> Compare la Taille et Date
			-  -->

<?php 

$erreur;

class Entreprise{

	private $nom;
	private $logo;
	private $rue;
	private $code_postal;
	private $ville;
	private $taille;
	private $date;

	public function __construct($newNom, $newLogo, $newRue, $newCP, $newVille, $newTaille, $newDate){
		$erreur = 0;
		if (strlen($newNom) > 20) {
			echo "Erreur taille du nom <br>";
			$erreur++;
		}
		if (strlen($newLogo) > 255) {
			echo "Erreur taille du logo <br>";
			$erreur++;
		}
		if (strlen($newRue) > 150) {
			echo "Erreur taille de la rue <br>";
			$erreur++;
		}
		if (strlen($newCP) > 5) {
			echo "Erreur taille du code postal <br>";
			$erreur++;
		}
		if (strlen($newVille) > 50) {
			echo "Erreur taille de la ville <br>";
			$erreur++;
		}
		if ($newTaille > 99999 || $newTaille < 0) {
			echo "Erreur nombre d'employés <br>";
			$erreur++;
		}
		if ($newDate > 2017 || $newDate < 0 ) {
			echo "Erreur année <br>";
			$erreur++;
		}
		if ($erreur == 0) {
			$this->nom = $newNom;
			$this->logo = $newLogo;
			$this->rue = $newRue;
			$this->code_postal = $newCP;
			$this->ville = $newVille;
			$this->taille = $newTaille;
			$this->date = $newDate;
		}
	}

	public function afficheNom(){
		return $this->nom;
	}
	public function afficheLogo(){
		return $this->logo;
	}
	public function afficheRue(){
		return $this->rue;
	}
	public function afficheCP(){
		return $this->code_postal;
	}
	public function afficheVille(){
		return $this->ville;
	}
	public function afficheTaille(){
		return $this->taille;
	}
	public function afficheDate(){
		return $this->date;
	}


	public function changeNom($newNom){
		if (strlen($newNom) > 20) {
			echo "Erreur taille du nom <br>";
		}
		else{	
			echo $this->nom . " a été changé en ";
			$this->nom = $newNom;
			echo $newNom;
		}
	}
	public function changeLogo($newLogo){
		if (strlen($newLogo) > 255) {
			echo "Erreur taille du logo <br>";
		}
		else{	
			echo $this->logo . " a été changé en ";
			$this->logo = $newLogo;
			echo $newLogo;
		}
	}
	public function changeRue($newRue){
		if (strlen($newRue) > 150) {
			echo "Erreur taille de la rue <br>";
		}
		else{
			$this->rue = $newRue;
			echo $this->rue;
		}
	}
	public function changeCP($newCP){
		if (strlen($newCP) > 5) {
			echo "Erreur taille du code postal <br>";
		}
		else{
			$this->code_postal = $newCP;	
			echo $this->code_postal;
		}
	}
	public function changeVille($newVille){
		if (strlen($newVille) > 50) {
			echo "Erreur taille de la ville <br>";
		}
		else{
			$this->ville = $newVille;
			echo $this->ville;
		}
	}
	public function changeTaille($newTaille){
		if ($newTaille > 99999 || $newTaille < 0) {
			echo "Erreur nombre d'employés <br>";
		}
		else{
			$this->taille = $newTaille;
			echo $this->taille;
		}
	}
	public function changeDate($newDate){
		if ($newDate > 2017 || $newDate < 0 ) {
			echo "Erreur année <br>";
		}
		else{
			$this->date = $newDate;
			echo $this->date;
		}
	}

	public function ficheSociete(){
		echo "<br> Nom : "; 
		echo $this->afficheNom();		
		echo "<br> Logo : "; 
		echo $this->afficheLogo();
		echo "<br> Rue : ";
		echo $this->afficheRue();
		echo "<br> Code postal : ";
		echo $this->afficheCP();
		echo "<br> Ville : ";
		echo $this->afficheVille();
		echo "<br> Taille : ";
		echo $this->afficheTaille();
		echo "<br> Date de création : ";
		echo $this->afficheDate();
	}

	public function comparaison($societe){
		$date2 = $societe->afficheDate();
		$taille2 = $societe->afficheTaille();
		$nom2 = $societe->afficheNom();
		if ($this->date > $date2) {
			echo $this->nom . " est moins ancienne que " . $nom2;
		}
		elseif ($this->date < $date2) {
			echo $nom2 . " est plus ancienne que " . $this->nom;
		}
		elseif ($this->date == $date2) {
			echo "Les deux entreprises " . $this->nom ." et " . $nom2 . " ont été fondées la meme année";
		}		
		echo "<br>";		
		if ($this->taille > $taille2) {
			echo $this->nom . " possède plus d'employés que " . $nom2;
		}
		elseif ($this->taille < $taille2) {
			echo $nom2 . " possède moins d'employés que " . $this->nom;
		}
		elseif ($this->taille == $taille2) {
			echo "Les deux entreprises " . $this->nom ." et " . 
			$nom2 . " possèdent un nombre égal d'employés";
		}
	}
}

$lepoles = new Entreprise("lepoles","lepoles.jpg", "9 Allée Jean Jaures", "93380", "Pierrefitte-sur-seine", 55, 1987);
$lepoles->ficheSociete();
echo "<hr>";
$webforce3 = new Entreprise("webforce3", "webforce3.jpg", "48 Rue de paris", "75018", "Paris", 135, 2012);
$webforce3->ficheSociete();
echo "<hr>";

$webforce3->comparaison($lepoles);
 ?>