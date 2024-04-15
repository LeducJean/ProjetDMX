<?php
// On essaye de se connecter  à  la BDD
    try {
        $ipserver = "localhost";
        $nomBase = "DMX";
        $loginPrivilege = "root";
        $passPrivilege = "";
        
        $GLOBALS["pdo"] = new PDO('mysql:host='.$ipserver.';dbname='.$nomBase.";charset=utf8mb4",$loginPrivilege,$passPrivilege);
    } 
    catch (Exception $error) 
    {
        $error->getMessage();
        echo "Erreur BDD : " .$error;
    }
?>