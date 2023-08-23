<?php

    require_once 'Models/Joueur.php';
    require_once 'Models/Monstre.php';
    require_once 'Models/Carte.php';

    /**
     * Commence une nouvelle partie
     */
    function startGame() {

        // Créer la carte
        $map = new Carte();
        // Génére les positions du trésor et des monstres
        $map->generateEntities(5);
    
        // Récupère les positions des différentes entités
        $monsterPos = $map->getMonsterPositions();
        $treasurePos = $map->getTreasurePosition();
    
        // Créer le joueur
        $joueur = new Joueur();
        // Génére une position aléatoire libre pour le joueur
        do {
            $playerPos = array('x' => rand(0, $map->getMapSize() - 1),'y' => rand(0, $map->getMapSize() - 1));
        } while ($playerPos == $treasurePos || in_array($playerPos, $map->getMonsterPositions()));
    
        // Affecte la position du joueur
        $joueur->setPosition($playerPos);
        var_dump($joueur);
    }

    /**
     * Déplace le joueur dans une direction donnée
     * 
     * @param string
     */
    function deplacerJoueur(string $pDirection) {

        // choix du déplacement
        switch ($pDirection) {
            case "droite":
                $joueur->seDeplacerDroite();
                break;
            case "gauche":
                $joueur->seDeplacerGauche();
                break;
            case "haut":
                $joueur->seDeplacerHaut();
                break;
            case "bas":
                $joueur->seDeplacerBas();
                break;
        }

        $joueurPosition = $joueur->getPosition();

        if($joueurPosition == $map->getTreasurePosition()) {
            // cas où le joueur est sur la case du trésor
            echo "GG YA WIN !!!";
        }
        else if (!in_array($joueurPosition, $map->getMonsterPositions())) {
            // cas où le joueur est sur une cas vide
            echo "Vous avez avancé. Vous vous trouvez en [".$joueurPosition['x'].", ".$joueurPosition['y']."].";
        } else { 
            // cas où le joueur est sur la case d'un monstre
            $joueur->combattreMonstre(new Monstre(3, 8));
        }
    }
    
?>