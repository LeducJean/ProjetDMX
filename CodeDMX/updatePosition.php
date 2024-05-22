<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


// Vérification de la méthode de la requête
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["id"], $_GET["x"], $_GET["y"])) {
    // Inclusion du fichier de connexion à la base de données
    require_once ('obj/connexionBdd.php');

    // Récupération des données depuis la requête GET
    $idLightBoard = $_GET['id'];
    $newX = $_GET['x'];
    $newY = $_GET['y'];

    try {
        // Récupérer les anciennes coordonnées du lightboard en mouvement
        $old_sql = "SELECT x, y FROM lightBoard WHERE id = ?";
        $old_stmt = $pdo->prepare($old_sql);
        $old_stmt->execute([$idLightBoard]);
        $old_coords = $old_stmt->fetch(PDO::FETCH_ASSOC);

        // Si des coordonnées existent pour le lightboard en mouvement
        if ($old_coords) {
            $oldX = $old_coords['x'];
            $oldY = $old_coords['y'];

            // Mettre à jour le lightboard en mouvement avec les nouvelles coordonnées
            $update_sql = "UPDATE lightBoard SET x = ?, y = ? WHERE id = ?";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->execute([$newX, $newY, $idLightBoard]);

            // Mettre à jour le lightboard précédemment occupé avec les anciennes coordonnées du lightboard en mouvement
            $update_old_sql = "UPDATE lightBoard SET x = ?, y = ? WHERE x = ? AND y = ? AND id != ?";
            $update_old_stmt = $pdo->prepare($update_old_sql);
            $update_old_stmt->execute([$oldX, $oldY, $newX, $newY, $idLightBoard]);

            // Mettre à jour le lightboard précédemment occupé par le lightboard en mouvement avec les anciennes coordonnées
            $update_new_sql = "UPDATE lightBoard SET x = ?, y = ? WHERE id != ?";
            $update_new_stmt = $pdo->prepare($update_new_sql);
            $update_new_stmt->execute([$oldX, $oldY, $idLightBoard]);
        } else {
            // Si aucune coordonnée n'existe pour cet ID, faire simplement la requête d'insertion
            $insert_sql = "INSERT INTO lightBoard (x, y, id) VALUES (?, ?, ?)";
            $insert_stmt = $pdo->prepare($insert_sql);
            $insert_stmt->execute([$newX, $newY, $idLightBoard]);
        }

        // Réponse JSON indiquant que la mise à jour a réussi
        echo json_encode(array("message" => "Position de la scène mise à jour avec succès"));
    } catch (PDOException $e) {
        // En cas d'erreur, renvoyer un message d'erreur JSON
        echo json_encode(array("error" => "Erreur lors de la mise à jour de la position de la scène : " . $e->getMessage()));
    }

    // Fermeture de la connexion à la base de données
    $pdo = null;
} else {
    // Si la méthode de requête n'est pas GET ou si les paramètres nécessaires ne sont pas fournis, renvoyer une erreur JSON
    echo json_encode(array("error" => "Paramètres invalides ou méthode de requête non autorisée. Seuls les requêtes GET avec les paramètres 'id', 'x', et 'y' sont acceptées."));
}
?>
