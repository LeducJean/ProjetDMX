<?php

require_once '../testCode/activerScene.php';
require_once '../obj/connexionBdd.php';

function assertEqual($expected, $actual)
{
    if ($expected !== $actual) {
        echo "Test échoué : valeur attendue ($expected) ne correspond pas à la valeur réelle ($actual)\n";
    } else {
        echo "Test réussi\n";
    }
}

// Créer une table temporaire pour les tests
$pdo->exec("CREATE TABLE IF NOT EXISTS scene_test (id INT PRIMARY KEY, active INT)");
$pdo->exec("INSERT INTO scene_test (id, active) VALUES (1, 0)");

activerScene::setPdo($pdo);
$result = activerScene::activerScene(1);

// Vérifier le résultat
assertEqual("ok", $result);

// Vérifier la base de données
$row = $pdo->query("SELECT active FROM scene_test WHERE id = 1")->fetchColumn();
assertEqual(1, $row);

// Supprimer la table temporaire
$pdo->exec("DROP TABLE scene_test");
