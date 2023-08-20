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

    }
?>