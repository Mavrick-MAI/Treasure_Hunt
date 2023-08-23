

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

      }
    </style>
  </head>
<body>
    <?php

        require_once 'logic.php';

        // var_dump($_SESSION['test']);
        // var_dump($_SESSION['map']->getMonsterPositions());
    ?>
    
    <div class="container">
      <div class="row">
        <h1>Treasure_Hunt</h1>

      </div>
      <button class="btn btn-outline-dark " onclick="startGame(this)">
        new game
      </button>
        <div class="row mt-3">      
            <div id = "chat" class="col-md-8 chatHere" style="height:80vh;overflow-y: scroll;">
              <?php echo $_SESSION['informations'] ?>
            </div>
            <div class="col-md-4 ">
              <div class="row mb-2">
                <div class="col-md-4"></div>
                <div class="col-md-4">              
                  <button class="btn" onclick="deplacerJoueur('haut')">
                  <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 384 512">
                    <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/>
                  </svg>
                  </button></div>
                <div class="col-md-4"></div>
            </div>

              <div class="row">

                <div class="col-md-4">
                  <button class="btn" onclick="deplacerJoueur('gauche')">
                  <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512">
                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                  </svg>
                  </button>
                </div>
                <div class="col-md-4">
                  <button class="btn" onclick="deplacerJoueur('bas')">
                    <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 384 512">
                      <path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                    </svg>
                  </button>
                  </div>
                <div class="col-md-4">
                  <button class="btn" onclick="deplacerJoueur('droite')">
                  <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512">
                  <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                </svg>
                </button>
                </div>

              </div>
              </button>
      
                
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>