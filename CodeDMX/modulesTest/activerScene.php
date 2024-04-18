<?php

include "../obj/connexionBDD.php";
include "../testCode/activerScene.php";

class activerSceneTest extends PHPUnit_Framework_TestCase
{
    private static $pdo;

    public static function setUpBeforeClass()
    {
        self::$pdo = new PDO('sqlite::memory:');
        self::$pdo->exec("CREATE TABLE scene (id INTEGER PRIMARY KEY, active INTEGER)");
        self::$pdo->exec("INSERT INTO scene (id, active) VALUES (1, 0)");

        activerScene::setPdo(self::$pdo);
    }

    public function testActiverScene()
    {
        ob_start();
        activerScene::activerScene(1);
        $output = ob_get_clean();

        $stmt = self::$pdo->query("SELECT active FROM scene WHERE id = 1");
        $result = $stmt->fetch();

        $this->assertEquals(1, $result['active']);
        $this->assertEquals("ok", $output);
    }

    public function testActiverSceneMissingId()
    {
        ob_start();
        activerScene::activerScene(null);
        $output = ob_get_clean();

        $this->assertEquals("Identifiant de scène manquant", $output);
    }
}
