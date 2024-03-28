<?php
session_start();

// Vérifier si l'utilisateur est connecté ou vient de s'inscrire
if (!isset($_SESSION['user_id']) && !isset($_SESSION['just_registered'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: index.php");
    exit();
}

// Traitement pour la déconnexion
if (isset($_POST['logout'])) {
    // Destruction de la session
    session_destroy();
    // Redirection vers la page de connexion
    header("Location: index.php");
    exit();
}

// Marquer l'utilisateur comme nouvellement inscrit
unset($_SESSION['just_registered']);
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stream Deck</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Bouton Se déconnecter -->
    <form method="post" action="">
        <input type="submit" name="logout" value="Se déconnecter">
    </form>

    <script src="js/script.js"></script>

</body>

</html>