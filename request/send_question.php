<!-- Cette page contient le script d'envoi d'une question par l'équipe $_POST['team'] pour le gamemaster -->

<?php
    include '../db.php';
    $date = date("Y-m-d H:i:s");
    $team = $_POST['team'];
    $question = $_POST['question'];
    
    $db -> query("INSERT INTO messages VALUES ('','$date',0,$team,'$question','')");
?>