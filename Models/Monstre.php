<?php

    require_once 'Personnage.php';

    class Monstre extends Personnage {

        static private $monstreType = array("Zombie", "Squelette", "Vampire", "Bandit", "Troll", "Gobelin", "Developpeur de Blizzard Entertainment");

		/**
		 * @return Monstre
		 */ 
        public function __construct(int $pPointVie, int $pForce) {
            
			parent::__construct($pPointVie, $pForce);
            $this->type = self::$monstreType[rand(0, 6)];
        }

    }
?>