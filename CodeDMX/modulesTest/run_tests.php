<?php
// Inclure le fichier contenant les fonctions de test
include_once 'test_functions.php';

// Exécuter les tests
echo "Test de sauvegarde des positions des boutons : ";
test_save_button_positions();
echo "<br>";

echo "Test d'envoi de requêtes lors du clic sur un bouton : ";
test_send_request_on_button_click();
echo "<br>";
?>
