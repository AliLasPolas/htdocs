<?php
    class Animal{
        public $nom;
        public $sexe;


        public function deplacement($type){
            echo "Je suis un ".$this->nom." me déplace en ".$type;
        	echo "<br>";

        }
    }

    class Aigle extends Animal{

        public $type = "volant";

        public function pondreDesOeufs(){
        	if ($this->sexe == "femelle") {
        		echo "L'Aigle " . $this->nom . " a pondu un oeuf";
        	}
        	else{
        		echo "L'Aigle " . $this->nom . " n'a pas pondu d'oeuf.";
        	}
        	echo "<br>";
        }

    }

    class Corail extends Animal{
    	public $type = " toute lenteur";

    	public function resterSurPlace(){
    		echo "Le corail " . $this->name . " est resté immobile";
        	echo "<br>";

    	}
    }

    class Ornithorynque extends Animal{
    	public $type = "nageant";

    	public function electrolocalisation($proie){ // Éléctrolocalisation s'écrit en un unique mot donc pas besoin d'utiliser de camelcase sur la fonction
    		echo "L'Ornithorynque " . $this->name . " détecte le champ éléctrique produit par les contractions musculaires de la proie " . $proie;
        	echo "<br>";

    	}
    }

    $royal = new Aigle();
    $royal->nom = "royal";
    $royal->sexe = "femelle";
    $royal->deplacement($royal->type);
    $royal->pondreDesOeufs($royal->type);

    $corail = new Corail();
    $corail->name = "Coraillon";
    $corail->resterSurPlace();

    $mike = new Ornithorynque();
    $mike->name = "Mike";
    $mike->electrolocalisation("Cédric");