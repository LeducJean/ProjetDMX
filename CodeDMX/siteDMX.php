<?php
session_start();

include "obj/placeBloc.php";

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
    <title>CodePen - Drag &amp; Drop Grid Layout in React</title>
    <style>
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!--

This is a proof of concept based on Cheng Lou's
totally amazing React Motion library:
https://github.com/chenglou/react-motion

Really just a proof of concept to see if I could get
it working across multiple columns (i.e. no source order 
reflowing) for a kanban / trello list app I'm working on.

However, I couldn't elegantly solve the issue of variable 
item heights in calculateVisiblePositions(), so have decided 
to drop this as it is and move over to react-dnd instead.

If anyone ever figures out how to do this with variable 
item heights, please let me know!

-->

    <h1 class="title">Drag &amp; Drop Grid Layout in React</h1>
    <div id="react-root"></div>
    <!-- partial -->
    <script src='//fb.me/react-with-addons-15.0.1.min.js'></script>
    <script src='//fb.me/react-dom-15.0.1.min.js'></script>
    <script src='//npmcdn.com/react-motion@0.4.2/build/react-motion.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.6.1/lodash.min.js'></script>











<?php
// Définir une variable PHP
$nom = "John";
?>


<script>
    // Passer une variable PHP à JavaScript
    var nomJS = "<?php echo $nom; ?>";
</script>


<!-- Inclure script.js après avoir défini la variable nomJS -->
<script src="js/scriptLightBoard.js"></script>





<!--ordre important-->





<?php
$variable2 = "<script>document.write(variable1);</script>";
echo $variable2;
?>


</body>

</html>