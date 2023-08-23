<?php

    require_once 'Models/Joueur.php';
    require_once 'Models/Monstre.php';
    require_once 'Models/Carte.php';

    session_start();

    // reception requête AJAX
    if (isset($_GET['function']) && function_exists($_GET['function'])) {
        if (isset($_GET['direction'])) {
            // cas où il s'agit d'un déplacement du joueur
            call_user_func($_GET['function'], $_GET['direction']);
        } else {
            // cas d'un lancement d'une partie
            call_user_func($_GET['function']);
        }
        unset($_GET['function']);
    }

    /**
     * Commence une nouvelle partie
     */
    function startGame() {

        // réinitialise les variables globales
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
        $_SESSION['informations'] = "<p>Début de la chasse !!<br>Vous vous trouvez en [".$playerPos['x'].", ".$playerPos['y']."].</p>";

    }

    /**
     * Déplace le joueur dans une direction donnée
     * 
     * @param string
     */
    function deplacerJoueur(string $pDirection) {

        $nouvelleInformations = "";

        $positionTreasure = $_SESSION['map']->getTreasurePosition();
        $positionJoueur = $_SESSION['joueur']->getPosition();

        if ($_SESSION['joueur']->getPointVie() > 0 && $positionJoueur !== $positionTreasure) {
            // cas où le joueur est en vie et n'est pas sur le trésor

            $longueurMap = $_SESSION['map']->getMapSize();
            $positionX = $positionJoueur['x'];
            $positionY = $positionJoueur['y'];

            $deplacement = true;
            // choix du déplacement
            switch ($pDirection) {
                case "droite":
                    if ($positionX < $longueurMap - 1) {
                        $_SESSION['joueur']->seDeplacerDroite();
                    } else {
                        $deplacement = false;
                        $nouvelleInformations .= "Déplacement impossible ! Vous êtes au bord de la carte !<br>";
                    }
                    break;
                case "gauche":
                    if ($positionX > 0) {
                        $_SESSION['joueur']->seDeplacerGauche();
                    } else {
                        $deplacement = false;
                        $nouvelleInformations .= "Déplacement impossible ! Vous êtes au bord de la carte !<br>";
                    }
                    break;
                case "haut":
                    if ($positionY < $longueurMap - 1) {
                        $_SESSION['joueur']->seDeplacerHaut();
                    } else {
                        $deplacement = false;
                        $nouvelleInformations .= "Déplacement impossible ! Vous êtes au bord de la carte !<br>";
                    }
                    break;
                case "bas":
                    if ($positionY > 0) {
                        $_SESSION['joueur']->seDeplacerBas();
                    } else {
                        $deplacement = false;
                        $nouvelleInformations .= "Déplacement impossible ! Vous êtes au bord de la carte !<br>";
                    }
                    break;
            }

            if ($deplacement) {
                // cas où le joueur s'est déplacé

                $joueurPosition = $_SESSION['joueur']->getPosition();
        
                if($joueurPosition == $_SESSION['map']->getTreasurePosition()) {
                    // cas où le joueur est sur la case du trésor
                    $nouvelleInformations .= "<p class='text-success fs-5'>GG YA WIN !!!</p>";
                }
                else if (!in_array($joueurPosition, $_SESSION['map']->getMonsterPositions())) {
                    // cas où le joueur est sur une cas vide
                    $nouvelleInformations .= "Vous avez avancé. Vous vous trouvez en [".$joueurPosition['x'].", ".$joueurPosition['y']."].<br>";
                } else { 
                    // cas où le joueur est sur la case d'un monstre
                    $resultatCombat = $_SESSION['joueur']->combattreMonstre(new Monstre(rand(3, 15), rand(3, 15)));
                    $nouvelleInformations .= $resultatCombat;
                    if ($_SESSION['joueur']->getPointVie() > 0) {
                        // cas où le joueur est toujours en vie
                        $monstrePosition = $_SESSION['map']->getMonsterPositions();
                        $indexMonstre = array_search($joueurPosition, $monstrePosition);

                        // retire le monstre vaincu du tableau
                        unset($monstrePosition[$indexMonstre]);
                        $_SESSION['map']->setMonsterPositions($monstrePosition);
                        $nouvelleInformations .= "Vous vous trouvez en [".$joueurPosition['x'].", ".$joueurPosition['y']."].<br>";
                    }
                }
            }
        }

        $_SESSION['informations'] = $nouvelleInformations.$_SESSION['informations'];

    }
    
?>