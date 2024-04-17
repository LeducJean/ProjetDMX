<?php

include "../obj/connexionBDD.php";

class LightBoardUpdater
{
    public static function updatePosition($id, $x, $y)
    {
        // Récupérer la connexion PDO
        global $pdo;

        // Préparer et exécuter la requête de mise à jour des positions x et y
        $stmt = $pdo->prepare("UPDATE lightBoard SET x = ?, y = ? WHERE idScene = ?");
        $stmt->execute([$x, $y, $id]);
    }
}

// Vérifier si les données sont reçues via une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données requises sont présentes
    if (isset($_POST["id"]) && isset($_POST["x"]) && isset($_POST["y"])) {
        LightBoardUpdater::updatePosition($_POST["id"], $_POST["x"], $_POST["y"]);
    }
}
