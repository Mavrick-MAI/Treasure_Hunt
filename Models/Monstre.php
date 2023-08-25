<?php

    require_once 'Personnage.php';

    class Monstre extends Personnage {

        static private $monstreType = array("Zombie", "Squelette", "Vampire", "Bandit", "Troll", "Gobelin", "Developpeur de Blizzard Entertainment");

		/**
         * La poche d'or
		 */ 
        protected int $or;

		/**
		 * @return Monstre
		 */ 
        public function __construct(int $pPointVie, int $pForce) {
            
			parent::__construct($pPointVie, $pForce);
            $this->type = self::$monstreType[rand(0, 6)];
            $this->or = rand(0, 10);
        }

        /**
		 * @return int
         * 
         * Retourne l'or
		 */ 
        public function getOr(): int {
            return $this->or;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie l'or
		 */ 
        public function setOr(int $pOr) {
            $this->or = $pOr;
        }

    }
?>