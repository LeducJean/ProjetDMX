<?php
include "inscription.php";
include "connexion.php";

// Utilisateur déjà connecté ?
if (isset($_SESSION['user_id'])) {
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styleIndex.css">
</head>

<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Inscrivez-vous</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" id="nom" name="nom" required class="form-control" placeholder="Votre nom *"
                            value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" id="prenom" name="prenom" required class="form-control"
                            placeholder="Votre prénom *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" autocomplete="off" id="email"
                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                            title="Veuillez fournir une adresse e-mail valide" required class="form-control"
                            placeholder="Votre mail *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" required class="form-control"
                            placeholder="Votre mot de passe *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" value="S'inscrire" class="btnSubmit" />
                    </div>
                    <!-- <div class="form-group">
                        <a href="#" class="ForgetPwd">Forget Password?</a>
                    </div> -->
                </form>
            </div>

            <div class="col-md-6 login-form-2">
                <h3>Connectez-vous</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" id="email" name="email" required class="form-control"
                            placeholder="Votre mail *" value="jeanleduc@gmail.com" />
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" required class="form-control"
                            placeholder="Votre mot de passe *" value="v4rna" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Se connecter" />
                    </div>
                    <!-- <div class="form-group">
                        <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

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