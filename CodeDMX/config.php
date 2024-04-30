<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include 'connexionBdd.php';

$sql = "SELECT * FROM lightBoard";
$result = $pdo->query($sql);

$config = array();

if ($result->rowCount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $config[] = $row['idScene'];
    }
} else {
    echo "No configuration found";
}

header('Content-Type: application/json');
echo json_encode($config);

$pdo = null;
?>
