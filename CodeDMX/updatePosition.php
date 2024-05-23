<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


// Vérification de la méthode de la requête
if (isset($_GET["id"])) {
    // Inclusion du fichier de connexion à la base de données
    require_once ('obj/connexionBdd.php');

    // Récupération des données depuis la requête GET
    $idUser = $_GET['idUser'];
    $idLightBoard = $_GET['id'];
    $newX = $_GET['x'];
    $newY = $_GET['y'];

    try {
        // Requête SQL pour sélectionner l'id où x et y sont égaux à newX et newY
        $sqlSelect = "SELECT id FROM lightBoard WHERE x = ? AND y = ?";
        $stmtSelect = $pdo->prepare($sqlSelect);
        $stmtSelect->execute([$newX, $newY]);

        // Récupérer le résultat
        $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

        $selectedId = null;
        if ($result) {
            $selectedId = $result['id'];
        }


        $sql2 = "UPDATE lightBoard SET x = 3, y = 3 WHERE id = $selectedId";
        $stmt2= $pdo->prepare($sql2);
        $stmt2->execute();


        // Requête SQL pour mettre à jour la position de la scène
        $sql = "UPDATE lightBoard SET x = ?, y = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$newX, $newY, $idLightBoard]);

        // Réponse JSON indiquant que la mise à jour a réussi
        echo json_encode(array("message" => "Position de la scène mise à jour avec succès"));
    } catch (PDOException $e) {
        // En cas d'erreur, renvoyer un message d'erreur JSON
        echo json_encode(array("error" => "Erreur lors de la mise à jour de la position de la scène : " . $e->getMessage()));
    }

    // Fermeture de la connexion à la base de données
    $pdo = null;
} else {
    // Si la méthode de requête n'est pas GET, renvoyer une erreur JSON
    echo json_encode(array("error" => "Méthode de requête non autorisée. Seules les requêtes GET sont acceptées."));
}
?>