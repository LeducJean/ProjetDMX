<?php
// config.php

// Inclusion du fichier de connexion à la base de données
require_once 'obj/connexionBdd.php';

// Récupération de la configuration actuelle
$query = $pdo->query('SELECT * FROM config ORDER BY position ASC');
$config = $query->fetchAll(PDO::FETCH_ASSOC);

// Conversion des données au format JSON
$json = json_encode($config);

// Envoi des données au client
header('Content-Type: application/json');
echo $json;
