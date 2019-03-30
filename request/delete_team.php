<?php //Cette page contient le script d'arret de jeu de l'équipe $_POST['id']
    require '../db.php';
    include '../auth.php';

    $id = $_POST['id'];
    $db -> query("UPDATE teams SET playing=0 WHERE id=$id");
?>
