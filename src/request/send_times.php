<?php //Cette page contient le script d'envoi des temps de la partie de l'équipe $_POST['id']
    include '../db.php';
    
    $id= $_POST['id'];
    $times = $_POST['times'];
    $db -> query("UPDATE teams SET times = '".$times."', playing=0 WHERE id=".$id);
?>