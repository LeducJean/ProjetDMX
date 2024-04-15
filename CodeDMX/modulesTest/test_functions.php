<?php
// Inclure le fichier contenant les fonctions à tester
include_once 'index.php';

// Fonction de test pour vérifier la sauvegarde des positions des boutons
function test_save_button_positions() {
    // Créer une connexion à la base de données de test (assurez-vous d'avoir une base de données de test distincte)
    $conn = new mysqli("localhost", "root", "", "DMX");

    // Vérifier si la connexion a échoué
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Exécuter une requête pour récupérer les positions des boutons depuis la base de données
    $sql = "SELECT x, y FROM lightBoard";
    $result = $conn->query($sql);

    // Vérifier si la requête a réussi
    if ($result->num_rows > 0) {
        // Parcourir les résultats
        while ($row = $result->fetch_assoc()) {
            // Vérifier si les positions des boutons sont valides
            // Vous pouvez remplacer les valeurs attendues par celles que vous souhaitez tester
            $position_attendue_x = 100; // Exemple de valeur attendue pour la position x
            $position_attendue_y = 150; // Exemple de valeur attendue pour la position y
            assert($row["x"] === $position_attendue_x);
            assert($row["y"] === $position_attendue_y);
        }
    } else {
        echo "0 résultats trouvés.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
}

// Fonction de test pour vérifier l'envoi de requêtes lors du clic sur un bouton
function test_send_request_on_button_click() {
    // Simuler un clic sur un bouton et vérifier si une requête est envoyée au serveur
    // Ici, nous simulons un clic sur le bouton avec un identifiant "button_id"
    $button_id = 1; // Remplacez par l'identifiant du bouton que vous souhaitez tester
    $result = send_request_on_button_click($button_id);

    // Vérifier si la requête a été envoyée correctement
    assert($result === true);
}
?>
