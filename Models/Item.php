<?php

    class Item {

		/**
         * Le nom
		 */ 
        protected string $nom;

		/**
         * L'image
		 */ 
        protected string $image;

		/**
         * Les points de vie procurés
		 */ 
        protected string $pointVie;

		/**
         * La force procurée
		 */ 
        protected string $force;

		/**
         * Le prix
		 */ 
        protected int $prix;

		/**
		 * @return Item
		 */ 
        public function __construct($pNom, $pImg) {

            $randomValue = rand(0, 4);
            $this->nom = $pNom;
            $this->image = $pImg;
            $this->pointVie = rand(0, 2);
            $this->force = rand(1, 2);
            $this->prix = rand(3, 25);
            
        }

        /**
		 * @return string
         * 
         * Retourne le nom
		 */ 
        public function getNom(): string {
            return $this->nom;
        }

		/**
		 * @param string
		 * @return void
         * 
         * Modifie le nom
		 */ 
        public function setNom(string $pNom) {
            $this->nom = $pNom;
        }

        /**
		 * @return string
         * 
         * Retourne l'image
		 */ 
        public function getImage(): string {
            return $this->image;
        }

		/**
		 * @param string
		 * @return void
         * 
         * Modifie l'image
		 */ 
        public function setImage(string $pImage) {
            $this->nom = $pImage;
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
         * Retourne le prix
		 */ 
        public function getPrix(): int {
            return $this->prix;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie le prix
		 */ 
        public function setPrix(int $pPrix) {
            $this->prix = $pPrix;
        }

    }
?>