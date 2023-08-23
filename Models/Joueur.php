<?php

    require_once 'Personnage.php';
    require_once 'Monstre.php';

    class Joueur extends Personnage {

		/**
         * La position
		 */ 
        protected array $position;

        // Les points de vie maximum de base
        const MAX_VIE = 10;

        // La force de base
        const FORCE = 5;

		/**
		 * @return Joueur
		 */ 
        public function __construct() {
            
			parent::__construct(self::MAX_VIE, self::FORCE);
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

		/**
		 * @return void
         * 
         * Le Joueur combat un monstre.
		 */ 
        public function combattreMonstre(Monstre $pMonstre) {

            $resultat = "";
            
            $resultat .= "Vous avez rencontré un monstre. Un combat commence.<br>";
            // Combat tant que le joueur et le monstre sont en vie
            while ($this->pointVie > 0 && $pMonstre->getPointVie() > 0) {
                // Le monstre subi un coup du joueur
                $resultat .= $pMonstre->prendUnCoup($this->force);
                if ($pMonstre->getPointVie() > 0) {
                    // Cas où le monstre survit au coup du joueur
                    // Le joueur subi un coup du monstre
                    $resultat .= $this->prendUnCoup($pMonstre->getForce());
                }
            }

            // Résultat du combat
            if ($this->pointVie <= 0) {
                // Cas de la défaite du joueur
                $resultat .=  "Défaite ! Vous êtes mort !<br>";
            } else {
                // Cas de la victoire du joueur
                $resultat .= "Victoire ! Vous avez vaincu le monstre !<br>";
                // Remet les points de vie du joueur au maximum
                $this->pointVie = self::MAX_VIE;
                // Le joueur de l'expérience selon la force du monstre vaincu
                $this->gagneExperience($pMonstre->getForce());
            }

            return $resultat;
        }

    }
?>