<?php
require_once 'Monstre.php';
require_once 'Joueur.php';

class carte {

    protected $tableSize ;

   
    protected $occupedPositions= array();

    //Creer le tableau
    protected $map;

    public function __construct() {
        $tableSize= rand(10,20);
        $map = array();
        for ($i = 0; $i < $tableSize; $i++) {
            $ligne = array();
            for ($j = 0; $j < $tableSize; $j++) {
                $ligne[] = array('x' => $i, 'y' => $j);
            }
            $map[] = $ligne;
        }
    }
    




    function generateEntities($nbMonstre){

        //Generer la position du trésor 
        $treasurePosition = array([rand($tableSize)],[rand($tableSize)]);
        array_push($occupedPositions , $treasurePosition);

        //Generer les monstres
        for ($i = 0 ; $i<$nbMonsters;$i++){
            $thisMonster = new Monstre();
            $thisMonsterPosition = array([rand($tableSize)],[rand($tableSize)]);
            while (in_array($thisMonsterPosition , $occupedPositions)){
                $thisMonsterPosition = array([rand($tableSize)],[rand($tableSize)]);
            }
            array_push($occupedPositions , $thisMonsterPosition);
        }

        //Genere le joueur
        $thisGamer = new Joueur();
        $thisGamerPosition = array([rand($tableSize),rand($tableSize)]);
        while (in_array($thisGamerPosition , $occupedPositions)){
            $thisGamerPosition = array([rand($tableSize),rand($tableSize)]);   
        }
        array_push($occupedPositions , $thisGamerPosition);
    }


    //La position est occupé par un monstre ?
    function isOccupedByMonsters(){
        if($thisGamerPosition !== $treasurePosition && in_array($thisGamerPosition,$occupedPositions)){
            new combat ();
            $thisGamerPosition([getPositionX],[getPositionY]);
            echo "case occupée, le combat commence";
        }
        else{
            echo "case vide, vous avez avancé";
            $thisGamerPosition([getPositionX],[getPositionY]);
        }
    }


    //La position est occupé par le trésor ?    
    function isOccupedByTreasure(){
        if($thisGamerPosition == $treasurePosition){
            echo "GG YA WIN !!!";
            $thisGamerPosition([getPositionX],[getPositionY]);
        }
        else{
            echo "case vide, vous avez avancé";
            $thisGamerPosition([getPositionX],[getPositionY]);
        }
    }


    //La position est occupé ?
    function isOccuped(){
        $thisGamerPosition([getPositionX],[getPositionY]);
        $lastIndex = array_key_last ( $occupedPositions );
        $occupedPositions[$lastIndex] = $thisGamerPosition;
        isOccupedByTreasure();
        isOccupedByMonsters();
    }
}

?>