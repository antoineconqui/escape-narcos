<?php //Cette page contient le script de connexion à la base de données
    $db = new mysqli("localhost","admin","admin","escapenarcos");
    $db->set_charset("utf8");
    $gmpassvalue = "pablo-escobar"; //Définition du mot de passe de gamemaster
?>