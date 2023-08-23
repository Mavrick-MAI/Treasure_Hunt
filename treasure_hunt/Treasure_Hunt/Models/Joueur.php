<?php

    require_once 'Personnage.php';

    class Joueur extends Personnage {

		/**
         * La position X
		 */ 
        protected int $positionX;

		/**
         * La position Y
		 */ 
        protected int $positionY;

		/**
		 * @return Joueur
		 */ 
        public function __construct(int $pPointVie, int $pForce) {
            
			parent::__construct($pPointVie, $pForce);
            $this->positionX = 0;
            $this->positionY = 0;
        }

        /**
		 * @return int
         * 
         * Retourne la position X
		 */ 
        public function getPositionX(): int {
            return $this->positionX;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie la position X
		 */ 
        public function setPositionX(int $pPositionX) {
            $this->positionX = $pPositionX;
        }

        /**
		 * @return int
         * 
         * Retourne la position Y
		 */ 
        public function getPositionY(): int {
            return $this->positionY;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie la position Y
		 */ 
        public function setPositionY(int $pPositionY) {
            $this->positionY = $pPositionY;
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
		 * @param int
		 * @return void
         * 
         * Le Joueur se déplace d'une case à droite.
		 */ 
        public function seDeplacerDroite() {
            $this->positionX++;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Le Joueur se déplace d'une case  à gauche.
		 */ 
        public function seDeplacerGauche() {
            $this->positionX--;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Le Joueur se déplace d'une case  en haut.
		 */ 
        public function seDeplacerHaut() {
            $this->positionY++;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Le Joueur se déplace d'une case  en bas.
		 */ 
        public function seDeplacerBas() {
            $this->positionY--;
        }

    }
?>