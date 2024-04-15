function simulateButtonClick() {
    // Sélectionner le bouton sur lequel nous voulons simuler un clic
    var button = document.getElementById('votre_bouton_id');

    // Simuler un clic sur le bouton
    button.click();
}

// Attacher la fonction à un événement de clic sur le bouton
document.addEventListener('DOMContentLoaded', function() {
    var button = document.getElementById('votre_bouton_id');
    button.addEventListener('click', function() {
        // Effectuer une requête Ajax ou soumettre un formulaire au serveur
        // Assurez-vous que le clic sur le bouton déclenche une action côté serveur
        // Ici, vous pouvez effectuer une requête Ajax ou soumettre un formulaire
        // Par exemple :
        /*
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "votre_script.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send();
        */
    });
});
