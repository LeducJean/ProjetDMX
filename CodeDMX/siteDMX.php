<?php
session_start();

// Vérifier si l'utilisateur est connecté ou vient de s'inscrire
if (!isset ($_SESSION['user_id']) && !isset ($_SESSION['just_registered'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: index.php");
    exit();
}

// Traitement pour la déconnexion
if (isset ($_POST['logout'])) {
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
    <h1>Bienvenue sur le site DMX</h1>
    <!-- Bouton Se déconnecter -->
    <form method="post" action="">
        <input type="submit" name="logout" value="Se déconnecter">
    </form>

    <h1 class="title">Drag &amp; Drop Grid Layout in React</h1>
    <div id="react-root"></div>
    <!-- partial -->
    <script src='//fb.me/react-with-addons-15.0.1.min.js'></script>
    <script src='//fb.me/react-dom-15.0.1.min.js'></script>
    <script src='//npmcdn.com/react-motion@0.4.2/build/react-motion.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.6.1/lodash.min.js'></script>
    <script src="./script.js"></script>

    <script src="js/script.js"></script>

</body>

</html>