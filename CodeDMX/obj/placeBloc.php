<?php
include "connexionBdd.php";









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