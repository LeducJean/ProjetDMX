<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Inclusion du fichier de connexion à la base de données
require_once('obj/connexionBdd.php');

try {
    // Requête SQL pour récupérer les données de la table 'scene'
    $sql = 'SELECT 
    id, 
    0 AS x, 
    0 AS y, 
    nom 
FROM 
    scene ';
 
    $stmt = $pdo->query($sql);
    $scenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Renvoi des données au format JSON
    echo json_encode($scenes);
} catch(PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$pdo = null;
