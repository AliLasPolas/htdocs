<!-- 

Une classe humain:
	Propriétés:
				-Nom
				-Prenom
				-Age
				-Sexe
	Methodes:
				-carteIdentite()
				-modifierNom($newNom)
				-modifierPrenom($newPrenom)
				-modifierAge($newAge)
				-modifierSexe($newSexe)
				-afficherNom()
				-afficherPrenom()
				-afficherAge()
				-afficherSexe()

 -->

<?php 

	class Humain{
		private $nom;
		private $prenom;
		private $age;
		private $sexe;
		private $erreur;

		public function __construct($newNom, $newPrenom, $newAge, $newSexe){
			$erreur = "";
			if (strlen($newNom) > 20) {
				$erreur .= "Erreur taille du nom<br>";
			}
			if (strlen($newPrenom) > 20) {
				$erreur .= "Erreur taille du prenom<br>";
			}
			if (!is_numeric($newAge)) {
				$erreur .= "Erreur de l'age<br>";
			}
			if ($erreur != "") {
				echo $erreur;
			}
			else{

				$this->nom = $newNom;
				$this->prenom = $newPrenom;
				$this->age = $newAge;
				$this->sexe = $newSexe;
			}
		}

		//SETTER

		public function modifierNom($newNom){
			if (strlen($newNom) > 20) {
				echo "Erreur taille du nom<br>";
			}
			else{
				$this->nom = $newNom;
			}
		}
		public function modifierPrenom($newPrenom){
			if (strlen($newNom) > 20) {
				echo "Erreur taille du prenom<br>";
			}
			else{
				$this->prenom = $newPrenom;
			}
		}
		public function modifierAge($newAge){
			if (!is_numeric($newAge) ) {
				echo "Erreur age<br>";
			}
			else{
				$this->age = $newAge;
			}
		}
		public function modifierSexe($newSexe){
			$this->age = $newAge;
		}

		//GETTER

		public function afficherAge(){
			echo "Age : " . $this->age . "<br>";
		}
		public function afficherSexe(){
			echo "Sexe : " . $this->sexe . "<br>";
		}
		public function afficherPrenom(){
			echo "Prenom : " . $this->prenom . "<br>";
		}
		public function afficherNom(){
			echo "Nom : " . $this->nom . "<br>";

		}

		public function carteIdentite(){
			$this->afficherNom();
			$this->afficherPrenom();
			$this->afficherAge();
			$this->afficherSexe();
		}
	}

	$juan = new Humain("Huevo", "Juan", 25, "Male");
	$juan->carteIdentite();
 ?>