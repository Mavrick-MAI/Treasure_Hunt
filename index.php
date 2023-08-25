<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasure_Hunt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      #chat{
        border: 1px solid;
        border-color:#ee410dbd ;
        border-radius: 10px;
        height:80vh;
        overflow-y: scroll;
      }

      @media (max-width: 576px) { 
        
        #chat{
          height:50vh;
          width: 95vw;
        }
      }
    </style>
  </head>
<body>
    <script src="js/script.js"></script>
    <?php

        require_once 'logic.php';
        var_dump($_SESSION['listeItem']);
    ?>
    
    <div class="container">
      <div class="row text-center">
        <h1 class="mt-3"><i class="fa-brands fa-jedi-order fa-2xl" style="color: #e08300;"></i> Treasure_Hunt <i class="fa-brands fa-rebel fa-xl" style="color: #d00b0b;"></i></h1>

      </div>
      <button class="btn btn-outline-dark " onclick="startGame()">
        Nouvelle partie
      </button>
      <div class="row mt-3 text-center justify-content-center">      
        <div id = "chat" class="col-sm-6 pt-2">
          <?php echo isset($_SESSION['informations']) ? $_SESSION['informations'] : "Pour commencer une partie, cliquez sur \"Nouvelle Partie\"" ?>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
          <div class="row mb-2 text-center justify-content-center">
            <h2>Votre personnage</h2>
            <div class="col-xl-3 mt-1"><i class="fa-solid fa-location-dot fa-xl" style="color: #c25b38;"></i> : <?php echo isset($_SESSION['joueur']) ? "[".$_SESSION['joueur']->getPosition()['x'] : ""; ?> <?php echo isset($_SESSION['joueur']) ? ", ".$_SESSION['joueur']->getPosition()['y']."]" : ""; ?></div>
            <div class="col-xl-3 mt-1"><i class="fa-solid fa-heart fa-xl" style="color: #ff0000;"></i> : <?php echo isset($_SESSION['joueur']) ? $_SESSION['joueur']->getPointVie() : ""; ?></div>
            <div class="col-xl-3 mt-1"><i class="fa-solid fa-hand-fist fa-xl" style="color: #382e2e;"></i> : <?php echo isset($_SESSION['joueur']) ? $_SESSION['joueur']->getForce() : ""; ?></div>
            <div class="col-xl-3 mt-1"><i class="fa-solid fa-angles-up fa-xl" style="color: #FFD700;"></i> : <?php echo isset($_SESSION['joueur']) ? $_SESSION['joueur']->getNiveau() : ""; ?></div>
          </div>
          <h3>Expérience</h3>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated <?php echo isset($_SESSION['progressBarColor']) ? $_SESSION['progressBarColor'] : "" ?>" style="width: <?php echo isset($_SESSION['joueur']) ? $_SESSION['joueur']->getPourcentXp() : "" ?>%"></div>
          </div>
          <div class="row mb-2 text-center justify-content-center mt-3">
            <div class="col-3 col-sm-4"></div>
            <div class="col-3 col-sm-4">              
              <button class="btn" onclick="deplacerJoueur('haut')">
              <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 384 512">
                <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/>
              </svg>
              </button>
            </div>
            <div class="col-3 col-sm-4"></div>
          </div>

          <div class="row text-center justify-content-center">

            <div class="col-3 col-sm-4">
              <button class="btn" onclick="deplacerJoueur('gauche')">
              <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512">
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
              </svg>
              </button>
            </div>
            <div class="col-3 col-sm-4">
              <button class="btn" onclick="deplacerJoueur('bas')">
                <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 384 512">
                  <path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                </svg>
              </button>
            </div>
            <div class="col-3 col-sm-4">
              <button class="btn" onclick="deplacerJoueur('droite')">
                <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512">
                <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                </svg>
              </button>
            </div>
          </div> 
          <!-- Tab links -->
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <button id="regleTab" class="nav-link active" onclick="switchTab(this)">Règles</button>
            </li>
            <li class="nav-item">
              <button id="shopTab" class="nav-link" onclick="switchTab(this)">Boutique</button>
            </li>

            <div id="shop" class="tabContent row border d-none py-1">
                <?php if (isset($_SESSION['listeItem'])) : ?>
                  <?php foreach ($_SESSION['listeItem'] as $item) : ?>
                    <div class="col-sm-4">
                      <div class="card" style="height:30vh;">
                        <img src="<?php echo $item->getImage() ?>" class="card-img-top" style="height:100px;">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $item->getNom() ?></h5>
                          <p class="card-text"><i class="fa-solid fa-heart" style="color: #ff0000;"></i> : <?php echo $item->getPointVie() ?></p>
                          <p class="card-text"><i class="fa-solid fa-hand-fist" style="color: #382e2e;"></i> : <?php echo $item->getForce() ?></p>
                          <button class="btn btn-success">Acheter</button>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
            </div> 
            <div id="regle" class="tabContent container row border">
              <h2 class="mt-5">Objectif:</h2>
              <ul class="text-start ms-5">
                <li>Trouver le trésor caché sur la carte</li>
                <li>Ne pas mourir</li>
              </ul>
              <h2 class="mt-5">Instructions:</h2>
              <p>Pour vous déplacez, cliquez sur les flèches directionnelles à l'écran.</p>
            </div> 
          </ul>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/8770a63ef6.js" crossorigin="anonymous"></script>
</body>