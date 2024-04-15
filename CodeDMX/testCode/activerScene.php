<?php
// Définir la fonction pour activer une scène avec un identifiant donné
function activerScene($sceneId) {
    // Récupérer l'identifiant de la scène envoyé depuis la requête POST
    if (isset($sceneId)) {
        // Traiter l'activation de la scène ici
        // Par exemple, mettre à jour une colonne dans la base de données indiquant que la scène est activée

        // Afficher "ok" comme réponse
        echo "ok";
    } else {
        // Si aucun identifiant de scène n'est envoyé, afficher un message d'erreur
        echo "Identifiant de scène manquant";
    }
}
?>
