<?php
require_once '../testCode/update_position.php';
require_once '../obj/connexionBdd.php';

function assertEqual($expected, $actual)
{
    if (!is_array($expected) && !is_array($actual)) {
        if ($expected !== $actual) {
            echo "Test échoué : valeur attendue ($expected) ne correspond pas à la valeur réelle ($actual)\n";
        } else {
            echo "Test réussi\n";
        }
    } elseif (is_array($expected) && is_array($actual)) {
        if ($expected != $actual) {
            echo "Test échoué : tableau attendu (";
            print_r($expected);
            echo ") ne correspond pas au tableau réel (";
            print_r($actual);
            echo ")\n";
        } else {
            echo "Test réussi\n";
        }
    } else {
        echo "Test échoué : types de données incompatibles\n";
    }
}


// Récupérer les valeurs initiales de x et y pour l'id 1
$initialRow = $pdo->query("SELECT x, y FROM lightBoard WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$initialX = $initialRow['x'];
$initialY = $initialRow['y'];

// Appeler la fonction updatePosition
LightBoardUpdater::updatePosition(1, 5, 10);

// Vérifier la base de données
$row = $pdo->query("SELECT x, y FROM lightBoard WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
assertEqual(5, $row['x']);
assertEqual(10, $row['y']);

// Réinitialiser les valeurs de x et y pour l'id 1
$pdo->exec("UPDATE lightBoard SET x = $initialX, y = $initialY WHERE id = 1");
