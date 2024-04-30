<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include 'obj/connexionBdd.php';

$data = json_decode(file_get_contents('php://input'), true);
$config = $data['config'];

$sql = "DELETE FROM lightBoard";
$pdo->exec($sql);

foreach ($config as $sceneId) {
    $sql = "INSERT INTO lightBoard (idScene) VALUES ($sceneId)";
    $pdo->exec($sql);
}

$pdo = null;
?>
