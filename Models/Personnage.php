<?php
    
    abstract class Personnage {

		/**
         * Les points de vie
		 */ 
        protected int $pointVie;

		/**
         * La force
		 */ 
        protected int $force;

		/**
         * Les points d'experience
		 */ 
        protected int $pointExperience;

		/**
         * Le type
		 */ 
        protected string $type;

		/**
		 * @return Personnage
		 */ 
        public function __construct(int $pPointVie, int $pForce) {
            $this->pointVie = $pPointVie;
            $this->force = $pForce;
            $this->pointExperience = 0;
        }

        /**
		 * @return int
         * 
         * Retourne les points de vie
		 */ 
        public function getPointVie(): int {
            return $this->pointVie;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie les points de vie
		 */ 
        public function setPointVie(int $pPointVie) {
            $this->pointVie = $pPointVie;
        }

        /**
		 * @return int
         * 
         * Retourne la force
		 */ 
        public function getForce(): int {
            return $this->force;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie la force
		 */ 
        public function setForce(int $pForce) {
            $this->force = $pForce;
        }

        /**
		 * @return int
         * 
         * Retourne les points d'expérience
		 */ 
        public function getPointExperience(): int {
            return $this->pointExperience;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie les points d'expérience
		 */ 
        public function setPointExperience(int $pPointExperience) {
            $this->pointExperience = $pPointExperience;
        }

        /**
		 * @return string
         * 
         * Retourne le type
		 */ 
        public function getType(): string {
            return $this->type;
        }

		/**
		 * @param string
		 * @return void
         * 
         * Modifie le type
		 */ 
        public function setType(string $pType) {
            $this->type = $pType;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Le Personnage prend un coup.
         * Les points de vie diminuent du montant de la force de l'ennemi.
		 */ 
        public function prendUnCoup(int $pForceEnnemi) {

            $resultat = "";

            $this->pointVie -= $pForceEnnemi;
            $resultat .= "<p>Le ".$this->type." a subi ".$pForceEnnemi. " dégâts.<br>";
            $resultat .= "Le ".$this->type." a ".$this->pointVie." points de vie restants.</p>";
            
            return $resultat;
        }

    }
?>