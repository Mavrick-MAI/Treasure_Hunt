<?php

    require_once 'Personnage.php';
    require_once 'Monstre.php';

    class Joueur extends Personnage {

		/**
         * La position
		 */ 
        protected array $position;

		/**
         * Le niveau
		 */ 
        protected int $niveau;

		/**
         * Les points de vie maximum
		 */ 
        protected int $maxVie;

		/**
         * La poche d'or
		 */ 
        protected int $pocheOr;

		/**
         * Le pourcent d'expérience 
		 */ 
        protected int $pourcentXp;

		/**
         * La liste d'items possédés 
		 */ 
        protected array $listItems;

        // Les points de vie de base
        const VIE = 10;

        // La force de base
        const FORCE = 5;

		/**
		 * @return Joueur
		 */ 
        public function __construct() {
            
			parent::__construct(self::VIE, self::FORCE);
            $this->maxVie = self::VIE;
            $this->type = "Joueur";
            $this->niveau = 1;
            $this->pourcentXp = 0;
            $this->pocheOr = 0;
            $this->listItems = array();
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
		 * @return int
         * 
         * Retourne le niveau
		 */ 
        public function getNiveau(): int {
            return $this->niveau;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie le niveau
		 */ 
        public function setNiveau(int $pNiveau) {
            $this->niveau = $pNiveau;
        }

        /**
		 * @return int
         * 
         * Retourne les points de vie maximum
		 */ 
        public function getMaxVie(): int {
            return $this->maxVie;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie les points de vie maximum
		 */ 
        public function setMaxVie(int $pMaxVie) {
            $this->maxVie = $pMaxVie;
        }

        /**
		 * @return int
         * 
         * Retourne la poche d'or
		 */ 
        public function getPocheOr(): int {
            return $this->pocheOr;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie la poche d'or
		 */ 
        public function setPocheOr(int $pPocheOr) {
            $this->pocheOr = $pPocheOr;
        }

        /**
		 * @return int
         * 
         * Retourne le pourcent d'expérience
		 */ 
        public function getPourcentXp(): int {
            return $this->pourcentXp;
        }

		/**
		 * @param int
		 * @return void
         * 
         * Modifie le pourcent d'expérience
		 */ 
        public function setPourcentXp(int $pPourcentXp) {
            $this->pourcentXp = $pPourcentXp;
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
		 * @param int
		 * @return void
         * 
         * Le Joueur gagne des points d'expérience équivalent à la force de l'ennemi vaincu.
		 */ 
        public function gagneExperience(int $pPointExperience) {

            $resultat = "";

            $this->pointExperience += $pPointExperience;

			// si le joueur a suffisament de points d'expérience.
			if ($this->pointExperience >= 10*$this->niveau) {
				// le joueur gagne un niveau.
				$this->niveau++;
				// le joueur gagne 2 points de vie.
				$this->maxVie += 2;
				// le joueur gagne un point de force.
				$this->force++;
				// les points d'expérience retombe à 0.
				$this->pointExperience = 0;

				$resultat .= "<p class='text-success text-uppercase'>Vous êtes passé niveau ".$this->niveau." !</p>";
				$resultat .= "<p>Point de vie : ".($this->maxVie-2)." ---> ".$this->maxVie." !<br>";
				$resultat .= "Force : ".($this->force-1)." ---> ".$this->force." !</p>";
			}
            // les pourcent d'expérience est modifié.
            $this->pourcentXp = $this->pointExperience*100/($this->niveau*10);
            $resultat .= "<p>Le Joueur possède désormais ".$this->pointExperience. " points d'expérience.<br>";
            $resultat .= "Il manque ".$this->niveau*10 - $this->pointExperience. " points d'expérience pour le prochain niveau.</p>";

            return $resultat;
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
            
            $resultat .= "<p>Vous avez rencontré un ".$pMonstre->getType().". Un combat commence.<br>";
            if ($pMonstre->getType() == "Developpeur de Blizzard Entertainment" && $this->pocheOr == 0) {
                $resultat .= "<p>Le ".$pMonstre->getType()." ne vous attaque pas car vous n'avez pas d'or.</p>";
            } else {
                // Combat tant que le joueur et le monstre sont en vie
                while ($this->pointVie > 0 && $pMonstre->getPointVie() > 0) {
                    // Le monstre subi un coup du joueur
                    $resultat .= $pMonstre->prendUnCoup($this->force);
                    foreach ($this->listItems as $item) {
                        $randomValue = rand(1, 10);
                        if ($item->getNom() === "Doomhammer" && $randomValue == 1) {
                            $resultat .= "<p>Grâce au pouvoir du Doomhammer, vous attaquez une seconde fois !!</p>";
                            // Le monstre subi un coup supplémentaire du joueur
                            $resultat .= $pMonstre->prendUnCoup($this->force);
                            break;
                        }
                        if ($item->getNom() === "Ashbringer" && $randomValue > 1 && $randomValue < 4) {
                            $resultat .= "<p>La chaleur intense de Ashbringer brûle votre ennemi !!</p>";
                            // Le monstre subi un coup supplémentaire du joueur
                            $resultat .= $pMonstre->prendUnCoup($this->force/2);
                            break;
                        }
                    }
                    if ($pMonstre->getPointVie() > 0) {
                        // Cas où le monstre survit au coup du joueur
                        // Le joueur subi un coup du monstre
                        $resultat .= $this->prendUnCoup($pMonstre->getForce());
                    }
                }
                // Résultat du combat
                if ($this->pointVie <= 0) {
                    // Cas de la défaite du joueur
                    $resultat .=  "<p class='text-danger'>Défaite ! Vous êtes mort !</p>";
                    $resultat .=  "<p class='text-danger'>Retentez votre chance en cliquant sur \"Nouvelle partie\"</p>";
                } else {
                    // Cas de la victoire du joueur
                    $resultat .= "<p class='text-success'>Victoire ! Vous avez vaincu le ".$pMonstre->getType()." !</p>";

                    if ($pMonstre->getType() == "Developpeur de Blizzard Entertainment") {
                        $this->pocheOr = 0;
                        $resultat .= "<p>Le ".$pMonstre->getType()." vous a volé votre or car Blizzard gagne toujours!<br>";
                        $resultat .= "Vous possédez ".$this->pocheOr." pièces d'or !</p>";
                    } else {
                        if ($pMonstre->getOr() != 0) {
                            // Le joueur gagne l'or du monstre
                            $this->pocheOr += $pMonstre->getOr(); 
                            // le Joueur ramasse de l'or
                            $resultat .= "<p>Vous avez trouvé  ".$pMonstre->getOr()." pièces d'or !<br>";
                            $resultat .= "Vous possédez ".$this->pocheOr." pièces d'or !</p>";
                        }
                    }
                    
                    // Le joueur de l'expérience selon la force du monstre vaincu
                    $resultat .= $this->gagneExperience($pMonstre->getForce());
                    // Remet les points de vie du joueur au maximum
                    $this->pointVie = $this->maxVie;
                }
            }
            $resultat .= "</p>";
            return $resultat;
        }

    }
?>