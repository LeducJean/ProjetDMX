<?php
// Inclure le fichier de connexion à la base de données
include "../connexionBdd.php";

try {
    // Requête SQL pour compter le nombre d'éléments dans la table "lightBoard"
    $requete = $GLOBALS["pdo"]->prepare("SELECT COUNT(*) AS total FROM lightBoard");
    
    // Exécution de la requête
    $requete->execute();
    
    // Récupérer le résultat
    $resultat = $requete->fetch(PDO::FETCH_ASSOC);
    
    // Afficher le nombre d'éléments
    echo "Le nombre d'éléments dans la table lightBoard est : " . $resultat['total'];
} 
catch (PDOException $erreur) {
    // En cas d'erreur lors de l'exécution de la requête
    echo "Erreur lors de l'exécution de la requête : " . $erreur->getMessage();
}


try {
    // Requête SQL pour sélectionner les valeurs de la colonne "x" de la table "lightBoard"
    $requete = $GLOBALS["pdo"]->prepare("SELECT x FROM lightBoard");
    
    // Exécution de la requête
    $requete->execute();
    
    // Récupérer les résultats dans un tableau
    $valeurs_x = $requete->fetchAll(PDO::FETCH_COLUMN);

    // Afficher les valeurs récupérées
    foreach ($valeurs_x as $valeur) {
        echo "Valeur de x : " . $valeur . "<br>";
    }

    // Vous pouvez maintenant utiliser les valeurs de x comme vous le souhaitez

} catch (PDOException $erreur) {
    // En cas d'erreur lors de l'exécution de la requête
    echo "Erreur lors de l'exécution de la requête : " . $erreur->getMessage();
}









// Définir une variable PHP
$nom = "John";
?>


<script>
    // Passer une variable PHP à JavaScript
    var nomJS = "<?php echo $nom; ?>";
</script>


<!-- Inclure script.js après avoir défini la variable nomJS -->
<script src="../js/scriptLightBoard.js"></script>





<!--ordre important-->





<?php
$variable2 = "<script>document.write(variable1);</script>";
echo $variable2;
?>