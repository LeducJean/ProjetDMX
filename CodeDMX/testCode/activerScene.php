<?php
class activerScene
{
    private static $pdo;

    public static function setPdo($pdo)
    {
        self::$pdo = $pdo;
    }

    public static function activerScene($sceneId)
    {
        if (isset($sceneId)) {
            // Préparer la requête SQL pour mettre à jour la colonne "active" de la scène dans la base de données
            $stmt = self::$pdo->prepare("UPDATE scene SET active = 1 WHERE id = ?");
            $stmt->execute([$sceneId]);

            // Vérifier si la requête a réussi
            if ($stmt->rowCount() > 0) {
                echo "ok";
            } else {
                echo "Erreur lors de l'activation de la scène";
            }
        } else {
            echo "Identifiant de scène manquant";
        }
    }
}
?>
