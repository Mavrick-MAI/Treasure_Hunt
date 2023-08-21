<?php

    require_once 'Personnage.php';

    class Joueur extends Personnage {

		/**
         * La position
		 */ 
        protected array $position;

		/**
		 * @return Joueur
		 */ 
        public function __construct(int $pPointVie, int $pForce) {
            
			parent::__construct($pPointVie, $pForce);
        }

        /**
		 * @return array
         * 
         * Retourne la position
		 */ 
        public function getPosition(): array {
            return $this->position;
        }

		/**
		 * @param array
		 * @return void
         * 
         * Modifie la position
		 */ 
        public function setPosition(array $pPosition) {
            $this->position = $pPosition;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Le Joueur gagne des points d'expérience équivalent à la force de l'ennemi vaincu.
		 */ 
        public function gagneExperience(int $pPointExperience) {
            $this->pointExperience += $pPointExperience;
            echo "Le Monstre a été vaincu.<br>";
            echo "Le Joueur possède ".$this->pointExperience. " points d'expérience.<br>";
        }

		/**
		 * @return void
         * 
         * Le Joueur se déplace d'une case à droite.
		 */ 
        public function seDeplacerDroite() {
            $this->position['x']++;
        }

		/**
		 * @return void
         * 
         * Le Joueur se déplace d'une case à gauche.
		 */ 
        public function seDeplacerGauche() {
            $this->position['x']--;
        }

		/**
		 * @return void
         * 
         * Le Joueur se déplace d'une case en haut.
		 */ 
        public function seDeplacerHaut() {
            $this->position['y']++;
        }

		/**
		 * @return void
         * 
         * Le Joueur se déplace d'une case en bas.
		 */ 
        public function seDeplacerBas() {
            $this->position['y']--;
        }

    }
?>