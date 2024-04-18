<?php

include "../obj/connexionBDD.php";
include "../testCode/LightBoardUpdater.php";

class LightBoardUpdaterTest extends PHPUnit_Framework_TestCase
{
    private static $pdo;

    public static function setUpBeforeClass()
    {
        self::$pdo = new PDO('sqlite::memory:');
        self::$pdo->exec("CREATE TABLE lightBoard (idScene INTEGER PRIMARY KEY, x INTEGER, y INTEGER)");
        self::$pdo->exec("INSERT INTO lightBoard (idScene, x, y) VALUES (1, 0, 0)");
    }

    public function testUpdatePosition()
    {
        LightBoardUpdater::updatePosition(1, 10, 20);

        $stmt = self::$pdo->query("SELECT x, y FROM lightBoard WHERE idScene = 1");
        $result = $stmt->fetch();

        $this->assertEquals(10, $result['x']);
        $this->assertEquals(20, $result['y']);
    }
}
