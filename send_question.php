<?php
    include 'db.php';
    $date = date();
    $team = $_POST['team'];
    $question = $_POST['question'];
    
    $db -> query("INSERT INTO messages VALUES ('','$date',0,$team,'$question','')");
?>