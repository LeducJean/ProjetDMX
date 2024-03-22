<?php
include "inscription.php";
include "connexion.php";

// Utilisateur déjà connecté ?
if(isset($_SESSION['user_id'])) {
    // Redirection vers la page de succès si l'utilisateur est déjà connecté
    header("Location: siteDMX.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription et de connexion</title>
</head>

<body>
    <h2>Inscription</h2>
    <form action="" method="post">
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">Prénom :</label><br>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="email">Mail :</label><br>
        <input type="email" name="email" autocomplete="off" placeholder="Email" id="email"
            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Veuillez fournir une adresse e-mail valide"
            required /><br>
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="S'inscrire">
    </form>

    <h2>Connexion</h2>
    <form action="" method="post">
        <label for="email">Mail :</label><br>
        <input type="text" id="email" name="email"" required><br>
        <label for=" password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Se connecter">
    </form>

    <?php
    // Affichage message d'erreur
    echo $_SESSION['passwordError'];
    echo $_SESSION['identifiantsError'];
    echo $_SESSION['inscriptionError'];
    // Réinitialisation message d'erreur
    $_SESSION['passwordError'] = "";
    $_SESSION['identifiantsError'] = "";
    $_SESSION['inscriptionError'] = "";
    ?>

</body>

</html>