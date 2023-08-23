/*window.onload = function () {
    const modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
    modal.show();
};*/
function hideThis(thisDiv) {
    const divToHide = document.getElementById(thisDiv);
    divToHide.style.display = "none";
}

window.onload = function() {
    setTimeout(function() {
        hideThis("hideMeAfter");
        document.getElementById("buttonsToMove").style.display="block";
    }, 5000);
    
}

let changingColor = false;

function changeColor(button) {
    if (changingColor) return;

    changingColor = true;
    const originalColor = button.style.background;
    const newColor = "purple"; // Changer la couleur à celle souhaitée
    button.style.background = newColor;
    
    const otherButtons = document.querySelectorAll('.color-button:not(.red)');
    otherButtons.forEach(btn => btn.disabled = true);

    setTimeout(() => {
        button.style.background = originalColor;
        otherButtons.forEach(btn => btn.disabled = false);
        changingColor = false;
    }, 500); // Revenir à la couleur d'origine après 1000 ms (1 seconde)
}