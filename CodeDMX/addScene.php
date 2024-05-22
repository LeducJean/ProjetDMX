<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Vérification de la méthode de la requête
if (isset($_GET["idUser"])) {
    // Inclusion du fichier de connexion à la base de données
    require_once ('obj/connexionBdd.php');

    // Récupération des données depuis la requête GET
    $idScene = $_GET['idScene'];
    $newX = $_GET['x'];
    $newY = $_GET['y'];
    $idUser = $_GET['idUser'];

    try {
        // Requête SQL pour insérer une nouvelle scène
        $sql = "INSERT INTO `lightBoard`(`idUser`, `x`, `y`, `idScene`) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idUser, $newX, $newY, $idScene]);

        // Réponse JSON indiquant que l'insertion a réussi
        echo json_encode(array("message" => "Position de la scène ajoutée avec succès"));
    } catch (PDOException $e) {
        // En cas d'erreur, renvoyer un message d'erreur JSON
        echo json_encode(array("error" => "Erreur lors de l'ajout de la scène : " . $e->getMessage()));
    }

    // Fermeture de la connexion à la base de données
    $pdo = null;
} else {
    // Si la méthode de requête n'est pas GET, renvoyer une erreur JSON
    echo json_encode(array("error" => "Méthode de requête non autorisée. Seules les requêtes GET sont acceptées."));
}
?>
