<?php
// Vérifier si les données sont reçues via une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données requises sont présentes
    if (isset($_POST["id"]) && isset($_POST["x"]) && isset($_POST["y"])) {
        // Connexion à la base de données
        $conn = new mysqli("192.168.64.213", "root", "root", "DMX");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Préparer et exécuter la requête de mise à jour des positions x et y
        $stmt = $conn->prepare("UPDATE lightBoard SET x = ?, y = ? WHERE idScene = ?");
        $stmt->bind_param("iii", $_POST["x"], $_POST["y"], $_POST["id"]);
        $stmt->execute();
        // Fermer la connexion à la base de données
        $stmt->close();
        $conn->close();
    }
}
?>
