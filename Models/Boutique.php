<?php

    require_once 'Item.php';

    class Boutique {

		/**
         * La liste d'objet
		 */ 
        protected array $listItems = array();

		/**
         * La liste des noms d'objet
		 */ 
        protected array $listItemNames;

		/**
         * La liste des images d'objet
		 */ 
        protected array $listItemImg;

		/**
		 * @return Boutique
		 */ 
        public function __construct() {
            $this->listItemNames = array("Illidan Glaives", "Buster Sword", "Ashbringer", "Frostmourne", "Doomhammer");
            $this->listItemImg = array("img/illidan_glaives.jpg", "img/buster_sword.png", "img/ashbringer.jpg", "img/frostmourne.jpg", "img/doomhammer.jpg");
        }

        /**
		 * @return array
         * 
         * Retourne la liste d'items
		 */ 
        public function getListItems(): array {
            return $this->listItems;
        }

		/**
		 * @param array
		 * @return void
         * 
         * Modifie la liste d'items
		 */ 
        public function setListItems(array $pListItems) {
            $this->listItems = $pListItems;
        }

        /**
		 * @return array
         * 
         * Retourne la liste des noms d'items
		 */ 
        public function getListItemNames(): array {
            return $this->listItemNames;
        }

		/**
		 * @param array
		 * @return void
         * 
         * Modifie la liste des noms d'items
		 */ 
        public function setListItemNames(array $pListItemNames) {
            $this->listItemNames = $pListItemNames;
        }

        /**
		 * @return array
         * 
         * Retourne la liste d'image d'items
		 */ 
        public function getListItemImg(): array {
            return $this->listItemImg;
        }

		/**
		 * @param array
		 * @return void
         * 
         * Modifie la liste des images d'items
		 */ 
        public function setListItemImg(array $pListItemImg) {
            $this->listItemImg = $pListItemImg;
        }

		/**
		 * @param int
		 * @return array
         * 
         * Génére des items
		 */ 
        public function generateItems() {
            $actualListItemNames = $this->listItemNames;
            $actualListItemImages = $this->listItemImg;

            $this->listItems = array();

            for ($i = 0; $i < 3; $i++) {
                $randomValue = rand(0, count($actualListItemNames) - 1);
                if ($actualListItemNames[$randomValue] != null) {
                    $this->listItems[$actualListItemNames[$randomValue]] = new Item($actualListItemNames[$randomValue], $actualListItemImages[$randomValue]);
                    array_splice($actualListItemNames, $randomValue, 1);
                    array_splice($actualListItemImages, $randomValue, 1);
                }
            }
        }

    }
?>