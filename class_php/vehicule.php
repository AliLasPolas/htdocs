<?php 
class vehicule{
	private $modele;
	private $marque;
	private $portes;
	private $annee;	
	private $kilometrage = 0;
	public $couleur;

	public function creationVehicule($newModele, $newMarque, $newPortes, $newAnnee, $newCouleur){
		$this->modele = $newModele;
		$this->marque = $newMarque;
		$this->portes = $newPortes;
		$this->annee = $newAnnee;
		$this->couleur = $newCouleur;
	}

	public function avancer($distance){
		$this->kilometrage += $distance;
	}

	public function reculer($distance){
		$this->kilometrage -= $distance;
	}

	public function carteGrise(){
		echo "Modele :" .$this->modele."<br>";
		echo "Marque :" .$this->marque."<br>";
		echo "Nombre de portes :" .$this->portes."<br>";
		echo "Année de fabrication :" .$this->annee."<br>";
		echo "Kilometrage :" .$this->kilometrage."<br>";
		echo "Couleur :" .$this->couleur."<br>";
	}
}

$audiTT = new vehicule();
$renaultMegane = new vehicule();
$audiTT->creationVehicule("TT","Audi",3,1998,"Noir");
$renaultMegane->creationVehicule("Mégane","Renault",5,2007,"Rouge");
$audiTT->avancer("55");
$renaultMegane->avancer("55");
$audiTT->carteGrise();
echo "<hr>";
$renaultMegane->carteGrise();

?>