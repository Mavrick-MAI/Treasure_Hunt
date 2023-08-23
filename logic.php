<?php

    require_once 'Models/Joueur.php';
    require_once 'Models/Monstre.php';
    require_once 'Models/Carte.php';

    session_start();

    // reception requête AJAX suite à un click sur une case
    if (isset($_GET['function']) && function_exists($_GET['function'])) {
        if (isset($_GET['direction'])) {
            call_user_func($_GET['function'], $_GET['direction']);
        } else {
            call_user_func($_GET['function']);
        }
        unset($_GET['function']);
    }

    // reception requête AJAX suite à un click sur une case
    if (isset($_GET['function']) && function_exists($_GET['function']) && isset($_GET['position'])) {
        call_user_func($_GET['function'], $_GET['position']);
    }

    /**
     * Commence une nouvelle partie
     */
    function startGame() {

        if (isset($_SESSION['map'])) {
            unset($_SESSION['map']);
            unset($_SESSION['joueur']);
            unset($_SESSION['informations']);
        }

        // Créer la carte
        $map = new Carte();
        // Génére les positions du trésor et des monstres
        $map->generateEntities(rand(10, 50));
    
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

        $_SESSION['map'] = $map;
        $_SESSION['joueur'] = $joueur;
        $_SESSION['informations'] = "Début de la chasse !!<br>Vous vous trouvez en [".$playerPos['x'].", ".$playerPos['y']."].<br>";

    }

    /**
     * Déplace le joueur dans une direction donnée
     * 
     * @param string
     */
    function deplacerJoueur(string $pDirection) {

        if ($_SESSION['joueur']->getPointVie() > 0) {
            
            $longueurMap = $_SESSION['map']->getMapSize();
            $positionX = $_SESSION['joueur']->getPosition()['x'];
            $positionY = $_SESSION['joueur']->getPosition()['y'];

            $deplacement = true;
            // choix du déplacement
            switch ($pDirection) {
                case "droite":
                    if ($positionX < $longueurMap - 1) {
                        $_SESSION['joueur']->seDeplacerDroite();
                    } else {
                        $deplacement = false;
                        $_SESSION['informations'] .= "Déplacement impossible ! Vous êtes au bord de la carte !<br>";
                    }
                    break;
                case "gauche":
                    if ($positionX > 0) {
                        $_SESSION['joueur']->seDeplacerGauche();
                    } else {
                        $deplacement = false;
                        $_SESSION['informations'] .= "Déplacement impossible ! Vous êtes au bord de la carte !<br>";
                    }
                    break;
                case "haut":
                    if ($positionY < $longueurMap - 1) {
                        $_SESSION['joueur']->seDeplacerHaut();
                    } else {
                        $deplacement = false;
                        $_SESSION['informations'] .= "Déplacement impossible ! Vous êtes au bord de la carte !<br>";
                    }
                    break;
                case "bas":
                    if ($positionY > 0) {
                        $_SESSION['joueur']->seDeplacerBas();
                    } else {
                        $deplacement = false;
                        $_SESSION['informations'] .= "Déplacement impossible ! Vous êtes au bord de la carte !<br>";
                    }
                    break;
            }

            if ($deplacement) {

                $joueurPosition = $_SESSION['joueur']->getPosition();
        
                if($joueurPosition == $_SESSION['map']->getTreasurePosition()) {
                    // cas où le joueur est sur la case du trésor
                    $_SESSION['informations'] .= "GG YA WIN !!!<br>";
                }
                else if (!in_array($joueurPosition, $_SESSION['map']->getMonsterPositions())) {
                    // cas où le joueur est sur une cas vide
                    $_SESSION['informations'] .= "Vous avez avancé. Vous vous trouvez en [".$joueurPosition['x'].", ".$joueurPosition['y']."].<br>";
                } else { 
                    // cas où le joueur est sur la case d'un monstre
                    $resultatCombat = $_SESSION['joueur']->combattreMonstre(new Monstre(rand(3, 15), rand(3, 15)));
                    $_SESSION['informations'] .= $resultatCombat;
                    if ($_SESSION['joueur']->getPointVie() > 0) {
                        $monstrePosition = $_SESSION['map']->getMonsterPositions();
                        $indexMonstre = array_search($joueurPosition, $monstrePosition);

                        unset($monstrePosition[$indexMonstre]);
                        $_SESSION['map']->setMonsterPositions($monstrePosition);
                        $_SESSION['informations'] .= "Vous vous trouvez en [".$joueurPosition['x'].", ".$joueurPosition['y']."].<br>";
                    }
                }
            }
        }

    }
    
?>