<?php
require_once 'Monstre.php';

class Carte {

    protected int $mapSize;

    protected array $treasurePosition;
   
    protected array $monsterPositions; 

    public function __construct() {
        $this->mapSize = rand(10,20);
        $this->monsterPositions = array();
    }

    /**
     * @return int
     * 
     * Retourne la taille
     */ 
    public function getMapSize(): int {
        return $this->mapSize;
    }

    /**
     * @param int
     * @return void
     * 
     * Modifie la taille
     */ 
    public function setMapSize(int $pMapSize) {
        $this->mapSize = $pMapSize;
    }

    /**
     * @return array
     * 
     * Retourne la position du trésor
     */ 
    public function getTreasurePosition(): array {
        return $this->treasurePosition;
    }

    /**
     * @param array
     * @return void
     * 
     * Modifie la position du trésor
     */ 
    public function setTreasurePosition(array $pTreasurePosition) {
        $this->treasurePosition = $pTreasurePosition;
    }

    /**
     * @return array
     * 
     * Retourne le tableau des positions des monstres
     */ 
    public function getMonsterPositions(): array {
        return $this->monsterPositions;
    }

    /**
     * @param array
     * @return void
     * 
     * Modifie le tableau des positions des monstres
     */ 
    public function setMonsterPositions(array $pMonstrePositions) {
        $this->monsterPositions = $pMonstrePositions;
    }

    /**
     * @param int
     * @return void
     * 
     * Génére les différentes entités sur la carte (hormis le Joueur)
     */ 
    function generateEntities($nbMonstre){

        // Genere la position du trésor 
        $this->treasurePosition = array('x' => rand(0, $this->mapSize - 1),'y' => rand(0, $this->mapSize - 1));

        //Genere les positions des monstres
        for ($i = 0 ; $i < $nbMonstre; $i++){
            // Boucle jusqu'à générer une position aléatoire libre
            do {
                $thisMonsterPosition = array('x' => rand(0, $this->mapSize - 1),'y' => rand(0, $this->mapSize - 1));
            } while ($thisMonsterPosition == $this->treasurePosition || in_array($thisMonsterPosition, $this->monsterPositions));
            // Insère la position dans le tableau des positions des monstres
            array_push($this->monsterPositions , $thisMonsterPosition);
        }
    }
}

?>