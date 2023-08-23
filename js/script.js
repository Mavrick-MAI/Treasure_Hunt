/**
 * Lance la partie
 */
function startGame() {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", "logic.php?function=startGame", true);
    xmlHttp.send();

    // rafraichir la page après la requête (NECESSAIRE)
    location.reload();

}

/**
 * Deplace le joueur dans la direction souhaitée
 * 
 * @param direction 
 */
function deplacerJoueur(direction) {

    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", "logic.php?function=deplacerJoueur&direction=" + direction, true);
    xmlHttp.send();

    // rafraichir la page après la requête (NECESSAIRE)
    location.reload();

}