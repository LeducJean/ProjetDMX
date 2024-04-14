document.addEventListener("DOMContentLoaded", function() {
    const scenes = document.querySelectorAll(".scene");

    scenes.forEach(scene => {
        let offsetX, offsetY;

        scene.addEventListener("mousedown", function(event) {
            // Empêcher la sélection de texte
            event.preventDefault();

            // Récupérer les coordonnées de la souris par rapport à la scène
            offsetX = event.clientX - scene.getBoundingClientRect().left;
            offsetY = event.clientY - scene.getBoundingClientRect().top;

            // Déplacer la scène en suivant le curseur de la souris
            document.addEventListener("mousemove", moveScene);
        });

        function moveScene(event) {
            // Calculer la nouvelle position de la scène en fonction des coordonnées de la souris et du décalage
            let x = event.clientX - offsetX;
            let y = event.clientY - offsetY;

            // Déplacer la scène
            scene.style.left = x + "px";
            scene.style.top = y + "px";
        }

        document.addEventListener("mouseup", function() {
            // Arrêter de suivre le mouvement de la souris lorsque le bouton de la souris est relâché
            document.removeEventListener("mousemove", moveScene);

            // Envoyer les données de position au script PHP pour mise à jour dans la base de données
            let id = scene.dataset.id;
            let x = parseInt(scene.style.left);
            let y = parseInt(scene.style.top);
            // Envoyer les données de position au script PHP pour mise à jour dans la base de données
            updatePosition(id, x, y);
        });
    });

    function updatePosition(id, x, y) {
        // Envoyer les données de position au script PHP pour mise à jour dans la base de données
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "update_position.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                // Faire quelque chose après la mise à jour des positions si nécessaire
            }
        };
        xhr.send("id=" + id + "&x=" + x + "&y=" + y);
    }
});
