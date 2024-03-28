<?php
// Inclure le fichier de connexion à la base de données
include 'connexionBdd.php';

try {
    // Préparer la requête SQL pour récupérer les scènes
    $query = "SELECT * FROM `scene`";
    $statement = $pdo->prepare($query);

    // Exécuter la requêt
    $statement->execute();

    // Récupérer les résultats sous forme de tableau associatif
    $scenes = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Convertir le tableau en format JSON et l'afficher
    echo json_encode($scenes);
} catch (PDOException $error) {
    // En cas d'erreur lors de l'exécution de la requête
    echo json_encode(array('error' => 'Erreur lors du chargement des scènes'));
}
?>