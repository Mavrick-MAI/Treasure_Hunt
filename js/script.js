/**
 * Lance la partie
 */
function startGame() {
    console.log("test")
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

/**
 * Change d'onglet
 */
function switchTab(pOnglet) {

    let onglets = document.getElementsByClassName("nav-link");
    Array.from(onglets).forEach(onglet => {
        onglet.classList.remove("active");
    });

    pOnglet.classList.add("active");

    let ongletContents = document.getElementsByClassName("tabContent");
    Array.from(ongletContents).forEach(ongletContent => {
        ongletContent.classList.remove("d-none");
    });

    switch (pOnglet.id) {
        case "shopTab":
            regleContent = document.getElementById("regle");
            regleContent.classList.add("d-none");
            break;
        case "regleTab":
            shopContent = document.getElementById("shop");
            shopContent.classList.add("d-none");
            break;
    }
}