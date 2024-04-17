<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des scènes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Liste des scènes</h1>
    <div id="scenes-container">
        <?php

        include '../obj/connexionBDD.php';

        // Connexion à la base de données
        $conn = new mysqli("$ipserver", "$loginPrivilege", "$passPrivilege", "$nomBase");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["activerScene"])) {
                activerScene::activerScene($_POST["activerScene"]);
            }
        }
        // Récupérer les scènes avec leurs positions x et y depuis la base de données
        $sql = "SELECT scene.id, scene.nom, lightBoard.x, lightBoard.y FROM scene INNER JOIN lightBoard ON scene.id = lightBoard.idScene";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='scene' data-id='" . $row["id"] . "' style='left: " . $row["x"] . "px; top: " . $row["y"] . "px;'>" . $row["nom"] . "</div>";
            }
        } else {
            echo "0 résultats";
        }

        // Fermer la connexion à la base de données
        $conn->close();
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>