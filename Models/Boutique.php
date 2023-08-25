<?php

    require_once 'Item.php';

    class Boutique {

		/**
         * La liste d'objet
		 */ 
        protected array $listItems = array();

		/**
		 * @return Boutique
		 */ 
        public function __construct($nbItems) {
            for ($i = 0; $i < $nbItems; $i++) {
                array_push($this->listItems, new Item());
            }
            
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
		 * @param string
		 * @return void
         * 
         * Modifie le listItems
		 */ 
        public function setListItems(array $pListItems) {
            $this->listItems = $pListItems;
        }

    }
?>