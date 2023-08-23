<?php

    require_once 'Personnage.php';

    class Monstre extends Personnage {

		/**
		 * @return Monstre
		 */ 
        public function __construct(int $pPointVie, int $pForce) {
            
			parent::__construct($pPointVie, $pForce);
        }

    }
?>