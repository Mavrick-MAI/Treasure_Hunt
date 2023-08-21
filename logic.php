<?php

    require_once 'Models/Joueur.php';
    require_once 'Models/Monstre.php';
    require_once 'Models/Carte.php';

    function startGame() {

        // Créer la carte
        $map = new Carte();
        // Génére les positions du trésor et des monstres
        $map->generateEntities(5);
    
        // Récupère les positions des différentes entités
        $monsterPos = $map->getMonsterPositions();
        $treasurePos = $map->getTreasurePosition();
    
        // Créer le joueur
        $joueur = new Joueur(5, 8);
        // Génére une position aléatoire libre pour le joueur
        do {
            $playerPos = array('x' => rand(0, $map->getMapSize() - 1),'y' => rand(0, $map->getMapSize() - 1));
        } while ($playerPos == $treasurePos || in_array($playerPos, $map->getMonsterPositions()));
    
        // Affecte la position du joueur
        $joueur->setPosition($playerPos);
    }
    

?>