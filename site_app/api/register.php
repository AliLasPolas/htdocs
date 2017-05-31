<?php 
	// echo "Las Polas ";

	class Personne{
		public $nom ="";
		public $prenom ="";
		public $poste ="";

		function __construct($nom, $prenom){
			$this->nom = $nom;		
			$this->prenom = $prenom;		
		}

		public function emploi($sonEmploi){
			$this->poste =  $sonEmploi;
		}
	}

	$Lakhdar = new Personne("Fahim", "Lakhdar");
	echo $Lakhdar->nom . " ";

	$Sylvestre = new Personne("Sylvestre", "Mike Christopher");
	echo $Sylvestre->nom . " ";

	$Juan = new Personne("Huevo", "Juan");
	echo $Juan->nom . " ";

	$Lakhdar->emploi("O-Tacos");
	echo $Lakhdar->poste . " ";


 ?>