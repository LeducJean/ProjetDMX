<?php
// Inclusion du fichier de connexion à la base de données
require_once('/obj/connexionBdd.php');

try {
    // Requête SQL pour récupérer les données de la table 'scene'
    $sql = 'SELECT * FROM scene';
    $stmt = $pdo->query($sql);
    $scenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Renvoi des données au format JSON
    header('Content-Type: application/json');
    echo json_encode($scenes);
} catch(PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$pdo = null;
?>
